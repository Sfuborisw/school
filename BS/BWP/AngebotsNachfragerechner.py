import time

#Angebot
#Angebot-Stueckzahl
AS = [150, 110, 80, 70, 50, 40]
#Angebot-Mindestkurs
AMK = [117, 118, 119, 120, 121, 122]
#ASM (Angebot-Stueckzahl Max)
ASM = AS[0]+AS[1]+AS[2]+AS[3]+AS[4]
#Angebot-Total
AT = [0,0,0,0,0,0]
#Angebots-Ueberschuss
AU = [0,0,0,0,0,0]
#Nachfrage
#Stueckzahl
NS = [110, 90, 75, 65, 50, 150]
#Nachfrage-Hoechstkurs
HK = [117, 118, 119, 120, 121, 122]
#Nachfrage-Total
NT = [0,0,0,0,0,0]
#Nachfrage-Ueberschuss
NU = [0,0,0,0,0,0]
rowpoint = 0
rows = 6
rows = int(raw_input("lines?\n>"))
c = 0

def definitions():
    global c
    while c < rows:
        d = c + 1
        print "setting up row: ", d
        AS[c] = int(raw_input("Angebots-Stueckzahl:\n>"))
        AMK[c] = int(raw_input("Angebots-Mindestkurs:\n>"))
        NS[c] = int(raw_input("Nachfrage-Stueckzahl:\n>"))
        HK[c] = int(raw_input("Nachfrage-Hoechstkurs:\n>"))
        c = c + 1

    print "Angebots-Stueckzahl: ", AS
    print "Angebots-Mindestkurs: ", AMK
    print "Nachfrage-Stueckzahl: ", NS
    print "Nachfrage-Hoechstkurs: ", HK


def Overcalc():
    varA = 0
    varN = 0
    global rowpoint
    global counter
    while rowpoint < rows:
        countpoint = rowpoint
        counter = 0
        while counter < rows:
            AT[rowpoint] = AT[rowpoint] + AS[countpoint]
            NT[rowpoint] = NS[rowpoint] - NS[countpoint]
            AU[rowpoint] = AS[rowpoint] - NS[rowpoint]
            NU[rowpoint] = NS[rowpoint] - AS[rowpoint]
            line = rowpoint + 1
            countpoint = countpoint - 1
            counter = counter + 1
        rowpoint = rowpoint + 1
    print "Angebot Total: ", AT
    print "Nachfrage Total: ", NT
    print "Angebots-Ueberschuss all: ", AU
    print "Nachfrage-Ueberschuss all: ", NU




definitions()
Overcalc()
