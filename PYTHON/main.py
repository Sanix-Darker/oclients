# main client
import argparse
from .settings import CHAT_ID, HOST_URL
from .utils import proceed


if __name__ == "__main__":
    # Initialize the arguments
    # Example command :
    # 
    prs = argparse.ArgumentParser()
    prs.add_argument('-f', '--filepath', 
                        help='File path of the file we want to upload', type=str)
    prs.add_argument('-c', '--chatid', 
                        help='Chat Id on Telegram account, see documentation of (https://ogramcloud.com)', 
                        type=str, default=CHAT_ID)
    prs.add_argument('-h', '--hosturl', 
                        help='The host of OgramCloud', 
                        type=str, default=HOST_URL)
    prs = prs.parse_args()

    proceed(prs.filepath, prs.hosturl, prs.chatid)
