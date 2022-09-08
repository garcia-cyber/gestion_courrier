#************************************* 
# 
# 
# 
# 
#                                       call bibliotheque 

from cgi import test
from crypt import methods
from pydoc import render_doc
from re import S
from flask import Flask , session, render_template , redirect ,url_for , request , flash
import mysql.connector as data 
import os


sql = data.connect(host ='localhost', user = 'lagarxia',password = 'linux',database = 'sania')


app = Flask(__name__)
app.secret_key = 'stechene '
app.config['UPLOAD_FOLDER1'] = 'static/document'




"""
######################################################### START index AND TRY SEND

"""

@app.route('/')
@app.route('/index')
def index():
    return  render_template('index.html')


@app.route('/index_send',methods = ['POST'])
def index_send():
    if request.method == 'POST':
        mail        = request.form['mail_agent']
        password    = request.form['password_agent']

        cur = sql.cursor()
        cur.execute("select * from agents where email_agent = %s and password_agent = %s ",(mail, password,))

        test_cur = cur.fetchone()

        if test_cur:
            session['index_true']       = True
            session['id_agent']         = test_cur[0]
            session['nom_agent']        = test_cur[1]
            session['email_agent']      = test_cur[2] 
            session['phone_agent']      = test_cur[3] 
            session['fonction_agent']   = test_cur[4] 
            session['password_agent']   = test_cur[5]
            session['date_agent']       = test_cur[6]
            session['sexe_agent']       = test_cur[7]

            if  session['fonction_agent'] == 1:
                return redirect(url_for('admin'))
            elif session['fonction_agent'] == 2:
                return 'service informatique bonjour '
            elif session['fonction_agent'] == 3:
                return 'bonjour directeur de cabinet'
            elif session['fonction_agent'] == 4:
                return 'mr le ministre '    
            elif session['fonction_agent'] == 5:
                return 'bonjour conseiller'
            else:
                return 'inviter'
        else:
            flash("Mot de passe ou identidiant incorrecte")
            return redirect(url_for('index'))

        
"""
######################################################### MOT DE PASSE OUBLIE

"""



@app.route('/forget')
def forget():
    return render_template('forget.html')


"""
######################################################### DECONNEXION



"""    
@app.route('/deco')
def deco():
    session.clear()
    return redirect(url_for('index'))
"""
######################################################### PROFILE
   

"""  
@app.route('/profile')
def profile():

    if 'index_true' in session:
        return render_template('profile.html', a = session['index_true'])
    else:
        return  redirect(url_for('index')) 




"""
######################################################### START ADMIN AND ALL PRIVELEGES

"""
#page admin 
@app.route('/admin')
def admin():
    if 'index_true' in session:
        #liste de fonction 
        # 
        # 
        #  
        fonction = sql.cursor()
        fonction.execute("select * from fonctions")
        test_fontion = fonction.fetchall()

        return render_template('admin.html', a = session['index_true'],aff_fonction = test_fontion)
    else:
        return redirect(url_for('index'))

#
#
# ADD AGENT
@app.route('/register_agent')
def register_agent():
    if 'index_true' in session:
        #liste de fonction 
        # 
        # 
        #  
        fonction = sql.cursor()
        fonction.execute("select * from fonctions")
        test_fontion = fonction.fetchall()
        return render_template('register_agent.html',a = session['index_true'], aff_agt = test_fontion)
    else:
        return redirect(url_for('index'))    


@app.route('/admin_register_agent',methods= ['GET','POST'])
def admin_register_agent():
    if request.method == "POST":
        nom         = request.form['nom_agent']
        mail        = request.form['mail_agent']
        phone       = str(request.form['phone_agent'])
        fonction    = request.form['fonction_agent']

        #verification du mail existe 
        mail_existe = sql.cursor()
        mail_existe.execute("select * from agents where email_agent = %s",(mail,))
        test_mail_existe = mail_existe.fetchone()

        #verification numero phone
        #
        #
        #
        phone_existe = sql.cursor()
        phone_existe.execute("select * from agents where phone_agent = %s", (phone,))
        test_phone_existe = phone_existe.fetchone()

        #verification si l'admin existe deja un admin seulement
        #
        #
        #
        admin_existe = sql.cursor()
        admin_existe.execute("select count(*) from agents group by fk_fonction having fk_fonction = 1 and count(*) >= 1")
        test_admin_existe = admin_existe.fetchone()

        #verification ministre existe deja 
        #
        #
        #
        ministre_existe = sql.cursor()
        ministre_existe.execute("select count(*) from agents group by fk_fonction having fk_fonction = 4 and count(*) >= 1")
        test_ministre_existe = ministre_existe.fetchone()

        #verification dircab existe
        #
        #
        #
        dircab_existe = sql.cursor()
        dircab_existe.execute("select count(*) from agents group by fk_fonction having fk_fonction = 3 and count(*) >= 1")
        test_dircab_existe = dircab_existe.fetchone()


        if test_mail_existe:
            flash("le mail exixte deja veillez change")
            return redirect(url_for('register_agent'))
        elif test_phone_existe:
            flash("ce numero existe deja veillez chande de numero")
            return redirect(url_for('register_agent')) 
        elif test_admin_existe:
            flash("pas moyen d'avoir deux administrateur")
            return redirect(url_for('register_agent')) 
        elif test_ministre_existe:
            flash("pas moyen d'avoir deux ministre dans le systeme")
            return redirect(url_for('register_agent'))  
        elif test_dircab_existe:
            flash("pas moyen d'avoir deux directeur de cabinet dans le systeme")
            return redirect(url_for('register_agent')) 

        else:
            cur = sql.cursor()
            cur.execute("insert into agents(nom_agent,email_agent,phone_agent,fk_fonction )values(%s,%s,%s,%s)",(nom,mail,phone,fonction,))
            sql.commit()
            cur.close()
            if int(fonction) == 2:
                flash("enregistrement de l'agent du service informatique reussi") 
                return redirect(url_for('register_agent'))
            elif int(fonction) == 3:
                flash("enregistrement du dircab reussi") 
                return redirect(url_for('register_agent'))
            elif int(fonction) == 4:
                flash("enregistrement du ministre reussi") 
                return redirect(url_for('register_agent'))  
            else:
                flash("enregistrement du conseiller reussi") 
                return redirect(url_for('register_agent'))  

                
#
#
# MODIFIER AGENT
@app.route('/modifier_agent/<string:id_agent>',methods = ['GET','POST'])
def modifier_agent(id_agent):
    if 'index_true' in session:
        if request.method == 'POST':
            nom         = request.form['nom_agent']
            mail        = request.form['mail_agent']
            phone       = str(request.form['phone_agent'])
            # fonction    = request.form['fonction_agent']

            cur = sql.cursor()
            cur.execute("update agents set nom_agent = %s , email_agent = %s , phone_agent = %s where id_agent = %s",(nom,mail,phone,id_agent,))
            sql.commit()
            cur.close()
            flash("modification reussi")

            return redirect(url_for('admin'))
   
        
       



        cur = sql.cursor()
        cur.execute("select * from agents where id_agent = %s" ,[id_agent,])
        test_cur = cur.fetchone()
        return render_template('modifie_agent.html',a = session['index_true'], data = test_cur)
    else:
        flash("pas d'autorisation veillez vous connecte ")
        return redirect(url_for('index'))     

"""
######################################################### END ADD AGENTS

"""



"""
######################################################### START SERVICE INFORMATIQUE AND MODIFICATION 

"""
@app.route('/service')
def service():
    if 'index_true' in session :
        pass 
    else:
        return redirect(url_for('index'))

@app.route('/service_send_doc',methods=['POST'])
def service_send_doc():
    if request.method == 'POST':
        titre = request.form['titre']
        nature = request.files['nature_doc']
        id_agent = session['id_agent'] 
        if nature.filename != '':
            send_file = os.path.join(app.config['UPLOAD_FOLDER1'],nature.filename)
            send_file.save()

            cur = sql.cursor()
            cur.execute("insert into documents(titre_document,nature_document,fk_agent)values(%s,%s,%s)",(titre,nature,id_agent,))
            sql.commit()
            cur.close()

            flash('document envoyer avec succes')
            return redirect(url_for('service')) 
"""
######################################################### END SERVICE INFORMATIQUE

"""







if __name__ == '__main__':
    app.run(debug=True ,port = '5000')