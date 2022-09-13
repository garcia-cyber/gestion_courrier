#************************************* 
# 
# 
# 
# 
#                                       call bibliotheque 

from cgi import test
from crypt import methods
from pickletools import read_uint1
from pydoc import render_doc
from re import S, U
from flask import Flask , session, render_template , redirect ,url_for , request , flash
import mysql.connector as data 
import os
# from main import app.config['UPLOAD_FOLDER1']


sql = data.connect(host ='localhost', user = 'lagarxia',password = 'linux',database = 'sania')


app = Flask(__name__)
app.secret_key = 'stechene '
app.config['UPLOAD_FOLDER1'] = "static/pdf"




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
            elif session['fonction_agent'] == 2 or session['fonction_agent'] == 6:
                return redirect(url_for('service'))
            elif session['fonction_agent'] == 3:
                return redirect(url_for('dircab')) 
            elif session['fonction_agent'] == 4:
                return redirect(url_for('dircab'))  
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
######################################################### AJOUT DES AGENTS 



""" 

@app.route('/ajout')
def ajout():
    if 'index_true' in session:
        fnc = sql.cursor()
        fnc.execute("select * from fonctions")
        t = fnc.fetchall()
        return render_template('ajout.html', a = session['index_true'],dat = t)
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
        #liste des agents 
        #
        #
        #
        agent = sql.cursor()
        agent.execute('select id_agent,nom_agent ,email_agent,phone_agent,libelle_fonction ,dateEnregistrement,sexe from agents inner join fonctions on agents.fk_fonction = fonctions.id_fonction ')
        tAg = agent.fetchall()
        return render_template('admin.html', a = session['index_true'],aff_fonction = test_fontion, aff_agent = tAg)
    else:
        return redirect(url_for('index'))


  

"""
######################################################### AJOUT DES AGENTS

"""

@app.route('/admin_register_agent',methods= ['GET','POST'])
def admin_register_agent():
    if request.method == "POST":
        nom         = request.form['nom_agent']
        mail        = request.form['mail_agent']
        phone       = str(request.form['phone_agent'])
        fonction    = request.form['fonction_agent']
        sexe        = request.form['sexe_agent']

       

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
        admin_existe.execute("select count(*) from agents group by fk_fonction having fk_fonction = 1 and count(*) > 1")
        test_admin_existe = admin_existe.fetchone()

        #verification ministre existe deja 
        #
        #
        #
        ministre_existe = sql.cursor()
        ministre_existe.execute("select count(*) from agents group by fk_fonction having fk_fonction = 4 and count(*) > 1")
        test_ministre_existe = ministre_existe.fetchone()

        #verification dircab existe
        #
        #
        #
        dircab_existe = sql.cursor()
        dircab_existe.execute("select count(*) from agents group by fk_fonction having fk_fonction = 3 and count(*) > 1")
        test_dircab_existe = dircab_existe.fetchone()


        if test_mail_existe:
            flash("le mail exixte deja veillez change")
            return redirect(url_for('ajout'))
        elif test_phone_existe:
            flash("ce numero existe deja veillez chande de numero")
            return redirect(url_for('ajout')) 
        elif test_admin_existe:
            flash("pas moyen d'avoir deux administrateur")
            return redirect(url_for('ajout')) 
        elif test_ministre_existe:
            flash("pas moyen d'avoir deux ministre dans le systeme")
            return redirect(url_for('ajout'))  
        elif test_dircab_existe:
            flash("pas moyen d'avoir deux directeur de cabinet dans le systeme")
            return redirect(url_for('ajout')) 

        else:
            cur = sql.cursor()
            cur.execute("insert into agents(nom_agent,email_agent,phone_agent,fk_fonction , sexe)values(%s,%s,%s,%s,%s)",(nom,mail,phone,fonction,sexe,))
            sql.commit()
            cur.close()
            if int(fonction) == 2 or int(fonction) == 6:
                flash("enregistrement de l'agent  reussi") 
                return redirect(url_for('ajout'))
            elif int(fonction) == 3:
                flash("enregistrement du dircab reussi") 
                return redirect(url_for('ajout'))
            elif int(fonction) == 4:
                flash("enregistrement du ministre reussi") 
                return redirect(url_for('ajout'))  
            else:
                flash("enregistrement du conseiller reussi") 
                return redirect(url_for('ajout'))  



"""
######################################################### SUPPRESSION DES AGENTS

"""
@app.route('/drop/<string:id_agent>',methods = ['POST','GET'])
def drop(id_agent):
    cur = sql.cursor()
    cur.execute("delete from agents where id_agent = %s",[id_agent])

    cur.close()
    return redirect(url_for('admin')) 

                
#
#
# MODIFIER AGENT
@app.route('/modify_agent/<string:id_agent>',methods = ['GET','POST'])
def modifier_agent(id_agent):
    if 'index_true' in session:
        if request.method == 'POST':
            nom         = request.form['nom_agent']
            mail        = request.form['mail_agent']
            phone       = str(request.form['phone_agent'])
            sexe       = request.form['sexe_agent']
            
            # fonction    = request.form['fonction_agent']

            cur = sql.cursor()
            cur.execute("update agents set nom_agent = %s , email_agent = %s, phone_agent = %s , sexe =%s  where id_agent = %s",(nom,mail,phone,sexe,id_agent, ))
            sql.commit()
            cur.close()
            flash("modification reussi")

            return redirect(url_for('admin'))
   
        
       

        fnc = sql.cursor()
        fnc.execute("select * from fonctions")
        t = fnc.fetchall()

        cur = sql.cursor()
        cur.execute("select * from agents where id_agent = %s" ,[id_agent,])
        test_cur = cur.fetchone()
        return render_template('modify_agent.html',a = session['index_true'], data = test_cur, dat = t)
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
        return render_template('menu.html',a = session['index_true'])
        
    #    return render_template('email-composercp.html',a = session['index_true'])
    else:
        return redirect(url_for('index'))

"""
######################################################### MESSAGE SECRETARIAT

"""        
@app.route('/secretaire')
def secretaire():
    if 'index_true' in session :
    
        
        return render_template('email-composercp.html',a = session['index_true'])
    else:
        return redirect(url_for('index'))        

@app.route('/service_send_doc',methods=['POST', 'GET'])
def service_send_doc():
    if request.method == 'POST':
        titre = request.form['sujet']
        nature = request.files['file']
        id_agent = session['id_agent'] 
        fonction = session['fonction_agent']

        if nature.filename != '':
            send_file = os.path.join(app.config['UPLOAD_FOLDER1'],nature.filename)
            nature.save(send_file)

            #verification du documment existant 
            doc = sql.cursor()
            doc.execute('select * from documents where nature_document = %s',(nature.filename,))
            test_doc = doc.fetchone()

            if test_doc:
                flash('document deja enregistre au server ')
                return redirect(url_for('secretaire')) 
            else:    

                cur = sql.cursor()
                cur.execute("insert into documents(titre_document,nature_document,fk_agent,fk_fonction)values(%s,%s,%s,%s)",(titre,nature.filename,id_agent,fonction,))
                sql.commit()
                cur.close()

                flash('document envoyer avec succes')
                return redirect(url_for('secretaire')) 

"""
######################################################### Modifier mot de passe 

"""

@app.route('/password_modifier')
def password_modifier():
    if 'index_true' in session:
      

        return render_template('password_modier.html',a = session['index_true'])
    else:
        return redirect(url_for('index'))
@app.route('/update_password/<string:id_agent>',methods =['POST','GET'])
def update_password(id_agent):
    if request.method == 'POST':
        acien = request.form['acien']
        mdp   = request.form['mdp']
        conf  = request.form.get('conf')

        call = session['id_agent'] 

        #verification 

        cur = sql.cursor()
        cur.execute('select * from agents where  password_agent = %s and id_agent = %s', (acien,id_agent))
        test_data = cur.fetchone()

        #verification du mot de passe conforme

        if test_data :
            if mdp != conf:
                flash('le mot de passe doit etre conformer')
                return redirect(url_for('profile'))
            else:
                c = sql.cursor()
                c.execute("update agents set password_agent = %s where id_agent = %s ", (mdp,id_agent,))  
                sql.commit()
                c.close()  
                return redirect(url_for('index'))

            
        else:
            flash('ancien mot de passe incorrecte')  
            return   redirect(url_for('profile'))

    cur = sql.cursor()
    cur.execute('select * from agents where id_agent = %s',[id_agent,])
    t_s = cur.fetchone()

    return render_template('password_modier.html',data = t_s)

"""
######################################################### Menue ministre et dircab

"""

@app.route('/dircab')
def dircab():
    if 'index_true' in session:
        return render_template('email-compose.html', a = session['index_true'])
    else:
        return redirect(url_for('index'))   


"""
######################################################### NOUVEAU MESSAGE 

"""

@app.route('/message')
def message():
    if 'index_true' in session:
        #affiche les message du secretariat
        msg = sql.cursor()
        msg.execute('select titre_document,nature_document ,date_entre , nom_agent, libelle_fonction from documents inner join agents on documents.fk_agent = agents.id_agent inner join fonctions on documents.fk_fonction = fonctions.id_fonction order by date_entre desc')
        test_doc = msg.fetchall()

        return render_template('drcbcompose.html', a = session['index_true'],message = test_doc)
    else:
        return redirect(url_for('index')) 

"""
######################################################### NOUVEAU MESSAGE 

"""

@app.route('/traite')
def traite():
    if 'index_true' in session:
        #affiche les message du secretariat
        msg = sql.cursor()
        msg.execute('select objet,pdf,date_sortie,heure_sortie,nom_agent,libelle_fonction from traitements inner join agents on traitements.fk_try_agent = agents.id_agent inner join fonctions on traitements.fk_try_fonction = fonctions.id_fonction order by date_sortie desc')
        test_doc = msg.fetchall()

        return render_template('drcb_traite.html', a = session['index_true'],message = test_doc)
    else:
        return redirect(url_for('index'))         


"""
######################################################### TRAITEMENT DU DOCUMENT  
"""
@app.route('/try_send',methods=['POST','GET'])
def try_send():

    if request.method == 'POST':
        objet   = request.form.get('objet')
        file    = request.files['file']
        agent   = session['id_agent']
        fonction = session['fonction_agent']

        if file.filename != '':

            upload_file = os.path.join(app.config['UPLOAD_FOLDER1'],file.filename)
           
            file.save(upload_file)

            #verification du fichier traite
            ver = sql.cursor()
            ver.execute('select * from traitements where pdf = %s',(file.filename,))
            test_ver = ver.fetchone()

            if test_ver:
                flash("ce fichier est deja traite ")
                return redirect(url_for('dircab'))
            else:
                cur = sql.cursor()
                cur.execute("insert into traitements(objet,pdf,fk_try_agent,fk_try_fonction)values(%s,%s,%s,%s)",(objet,file.filename,agent,fonction,))
                sql.commit()
                cur.close()
                sql.close()
                flash('Envoie reussi')
                return redirect(url_for('dircab'))
                
"""
######################################################### Modification de photo 
"""
@app.route('/photo/')
def photo():
    if 'index_true' in session:
        return render_template('') 
    else:
        return redirect(url_for('index'))

            

# @app.route('/boite')
# def boite():
#     if 'index_true' in session:
#         return render_template('email-compose.html', a = session['index_true'])
#     else:
#         return redirect(url_for('index')) 







if __name__ == '__main__':
    app.run(debug=True ,port = '5000')