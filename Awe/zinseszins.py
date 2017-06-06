Kredit = -1
Jahre = -1
Zins = -1

Jahresarray = []
Zinsesarray = []
Umfangsarray = []


def Rechnung(Kredit, Jahre, Zins):

    DiesesJahr = 1

    while Jahre > 0:

        Neuer_Umfang = float
        
        Neuer_Umfang = Kredit * Zins
        Zinsen = Neuer_Umfang - Kredit

        Jahresarray.append(DiesesJahr)
        Umfangsarray.append(Neuer_Umfang)
        Zinsesarray.append(Zinsen)

        Kredit = Neuer_Umfang
        DiesesJahr += 1
        Jahre -= 1

    return(Kredit)


def main():

    global Kredit, Jahre, Zins

    while Kredit < 0:
        Kredit = int(raw_input('Welchen Umfang soll der Kredit haben?\n'))

    while Jahre < 0:
        Jahre = int(raw_input('Ueber wie viele Jahre soll der Kredit gelten?\n'))

    while Zins < 0:
        Zins = float(raw_input('Was ist dein Zinsessatz?\n'))

    Rechnung(Kredit, Jahre, Zins)

    n = 0
    i = len(Jahresarray)

    while n < i:
        print('Jahr: ' + str(Jahresarray[n]) + ' | Zins: ' + str(Zinsesarray[n]) + ' | Umfang: ' + str(Umfangsarray[n]))
        n += 1


if __name__ == '__main__':
    main()


'''
GET(CREDIT, MAX_CREDIT_YEARS, INTEREST_RATE)
->
WHILE CURRENT-YEAR < MAX_CREDIT_YEARS:
     SAVE CURRENT(YEAR, CREDIT, INTEREST)
->
FOR ELEMENT IN ARRAYS:
     PRINT YEAR, CREDIT, INTEREST
->
TERMINATE'''