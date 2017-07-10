def define_and_save_user():
    user = []
    userfile = 'users.txt'
    
    firstname = raw_input('Tell me the first name!\n>')
    lastname = raw_input('Tell me the last name!\n>')
    age = raw_input('Tell me the age!!\n>')
    hometown = raw_input('Tell me the hometown!\n>')

    user.append(hometown)
    user.append(lastname)
    user.append(age)
    user.append(hometown)

    user_statement = 'The users first name is ' + user[0] + '.\nHis last name is ' + user[1] + '.\nHis age is ' + str(user[2]) + '.\nHis hometown is ' + user[3] + '.'

    for x in user_statement:
        with open(userfile, 'a') as uf:
            uf.write(x)

    with open(userfile, 'a') as uf:
        uf.write('\n')


define_and_save_user()