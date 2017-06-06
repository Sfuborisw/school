pos_conditions = [4, 400]
neg_conditions = [100]
schaltjahre = []

def main():
    while True:
        Jahr = int(raw_input('Gib ein Jahr ein!\nJahr > '))
        IsSchaltjahr(Jahr)

def IsSchaltjahr(Jahr):
    if not Jahr in schaltjahre:
        print('%i ist kein Schaltjahr.' % Jahr)
    else:
        print('%i ist ein Schaltjahr.' % Jahr)

def forbidden_years():
    for i in range(1000, 2999):
        test_var(i)
    with open('Schaltjahre.txt', 'w') as wipedfile:
        pass
    with open('Schaltjahre.txt', 'a') as myfile:
        for x in schaltjahre:
            myfile.write(str(x) + '\n')

def test_var(i):
    for x in pos_conditions:
        if i % x == 0:
            for y in neg_conditions:
                if not i % y == 0:
                    schaltjahre.append(i)

if __name__ == '__main__':
    forbidden_years()
    main()