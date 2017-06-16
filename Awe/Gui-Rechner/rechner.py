import os
import rechenklasse
import sys
import time



def session_manager():

    while True:

        menue()



def menue():

    zahl1 = float(raw_input('first number:\n> '))
    zahl2 = float(raw_input('second number:\n> '))
    operator = raw_input('operation (+, -, *, /, % ):\n')

    result = rechenklasse.Rechner().rechnen(zahl1, zahl2, operator)

    while True:
        i = 0
        while i < 20:
            print(':THINKING:')
            print('SORRY, I CANT LET YOU DO THAT SAM')
            time.sleep(0.2)
            i += 1
        os.system('clear')
    #print('\n%i %s %i results in %i.\n\n' %(zahl1, operator, zahl2, result))



if __name__ == '__main__':
    
    session_manager()