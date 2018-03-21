def main():
    while True:
        while not type(Jahr) == int:
            Jahr = int(raw_input('Gib ein Jahr ein!))



def IsSchaltjahr(Jahr):
    if Jahr in ForbiddenArray:
        print('%i ist kein Schaltjahr.' % Jahr)
    else:
        print(%i ist ein Schaltjahr.' % Jahr)



def forbidden_years():
    for i in range(1899, 2999):
        test_var(i)



def test_var(i):
    for x in conditions:
        if i % x = 0:
            forbidden_years.append(i)



if __name__ == '__main__':
    forbidden_years()
    main()