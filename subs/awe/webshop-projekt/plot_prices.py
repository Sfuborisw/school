import matplotlib.pyplot as plt
import sqlite3

con = sqlite3.connect('static/db/webshop.db')
c = con.cursor()

def db_q(target):
    return c.execute('select %s from products' %(target))

prices = [x[0] for x in db_q('price')]
labels = [x[0] for x in db_q('en_name')]

del prices[3], labels[3]

plt.plot([x for x in range(len(labels))], prices)
plt.xlabel = 'Prices'
plt.ylabel = 'Products'
plt.show()
