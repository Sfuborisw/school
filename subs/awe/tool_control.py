import tool_config
import time

def session_manager():
    while True:
        menue()
        time.sleep(5)

def menue():
    # myvarname = raw_input('What is your first name?\n')
    # myvar = tool_config.Person()
    # myfirstname = myvar.setFirstName(myvarname)

    # ln = raw_input('What is your last name?\n')
    # mylastname = myvar.setLastName(ln)


    # myfullname = myvar.return_full_name()
    # print('\nYour name is %s.\n' % (myfullname))

    zahl1 = int(raw_input('first number:\n'))
    zahl2 = int(raw_input('second number:\n'))
    operator = raw_input('first number (+ - * / ):\n')

    result = tool_config.Rechner().rechnen(zahl1, zahl2, operator)
    print('%i %d %i results in %i.' %(zahl1, zahl2, operator, result))

if __name__ == '__main__':
    session_manager()