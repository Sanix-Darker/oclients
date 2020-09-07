# First, install configparser using "pip install configparser"
import configparser as ConfigParser

# Configs parameters
configParser = ConfigParser.RawConfigParser()   
configFilePath = r'config.txt'
configParser.read(configFilePath)

# Filling parameters
CHAT_ID = configParser.get('oclients', 'CHAT_ID')
HOST_URL = configParser.get('oclients', 'HOST_URL')
