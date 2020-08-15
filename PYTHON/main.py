import requests
import json

url = "https://ogramcloud.com/api/upload"

files = {
    "file": open("./c1.jpg", "rb")
}
values = {
    "chat_id": "267092256"
}

r = requests.post(url, files=files, data=values)

content = r.content.decode()

print("[+] content: ", content)
print("-" * 15)

print("[+] file_key: ", json.loads(content)["file_key"])
# 846544e9280ab4e9c63e5be8b4249b81