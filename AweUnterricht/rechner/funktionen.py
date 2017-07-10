def main():
    while True:
        menue()

options = ['add', 'multiply']

def menue():
    print('Dies sind deine Optionen:')
    i = 1
    for option in options:
        print(str(i) + ' ' + option)
        i += 1

    print('What do you want to do?')

    usercommand = int(raw_input('Gib deine Auswahl ein! (Zahl!)'))
