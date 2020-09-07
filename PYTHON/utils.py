import requests
import json


def proceed(file_path: str, host_url: str, chat_id: str):
    """
    This method will proceed the upload to Ogram-API
    ::file_path:: The file path of the file you want to upload
    """
    
    files = {
        "file": open(file_path, "rb")
    }
    values = {
        "chat_id": chat_id
    }

    r = requests.post(
        host_url + "/api/upload", 
        files=files, 
        data=values
    )

    content = r.content.decode()

    print(host_url + "/api/file/" + json.loads(content)["file_key"])
