import sys
import urllib.request, json 
with urllib.request.urlopen("http://localhost/index.json.php?id="+sys.argv[1]) as url:
    data = json.loads(url.read().decode())
    print("title : "+data['title'])
    print("description : "+data['description'])