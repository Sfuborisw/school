def rechnen():
    ergebnis = int
    run = True

    zahl1 = int(raw_input('Give me a number please!\n>'))
    zahl2 = int(raw_input('Give me a number please!\n>'))
    cmd = raw_input('Give me a command please!( + - * / )\n>')

    if cmd == '+':
        ergebnis = zahl1 + zahl2
    elif cmd == '-':
        ergebnis = zahl1 - zahl2
    elif cmd == '*':
        ergebnis = zahl1 * zahl2
    elif cmd == '/':
        ergebnis = zahl1 / zahl2
    else:
        run = False

    if run == True:
        print(str(ergebnis) + ' = ' + str(zahl1) + ' ' + cmd + ' ' + str(zahl2) + '.')
    else:
        print('Can not parse: ' + cmd)



zahl1 = int(raw_input('Give me a number please!\n>'))
zahl2 = int(raw_input('Give me a number please!\n>'))
cmd = raw_input('Give me a command please!( + - * / )\n>')

def rechnen_mit_parametern(zahl1, zahl2, cmd):
    ergebnis = int
    run = True

    if cmd == '+':
        ergebnis = zahl1 + zahl2
    elif cmd == '-':
        ergebnis = zahl1 - zahl2
    elif cmd == '*':
        ergebnis = zahl1 * zahl2
    elif cmd == '/':
        ergebnis = zahl1 / zahl2
    else:
        run = False

    if run == True:
        return(str(ergebnis) + ' = ' + str(zahl1) + ' ' + cmd + ' ' + str(zahl2) + '.')
    else:
        return('Can not parse: ' + cmd)


while True:
    ergebnis = rechnen_mit_parametern(zahl1 = 20, zahl2 = 30, cmd = '*')
    print(ergebnis)