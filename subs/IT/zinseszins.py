def Rechnung(Kredit, Jahre, Zins):
    while Jahre > 0:
        quittung = Kredit * Zins
        print('Die Quittung für dieses Jahr beträgt %i.' % Quittung)
        Kredit = quittung
        jahre -= 1

def main():
    while Kredit < 0:
        Kredit = int(raw_input('Wie groß soll der Kredit sein?/n'))
    while Jahre < 0:
        Jahre = int(raw_input('über wie viele Jahre soll der Kredit gelten?\n'))
    while Zins < 0:
        Zins = int(raw_input('Was ist dein Zinsessatz?\n'))
    Rechnung(Kredit, Jahre, Zins)

if __name__ == '__main__':
    main()