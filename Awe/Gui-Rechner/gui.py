from tkinter import Tk, Label, Button, Entry, IntVar, END, W, E
import os
import sys
import time

def smileys():
    smiley = "\\(o.o)/"
    spaces = " "
    for i in range (0,100):
        print(smiley)
        smiley = spaces + smiley
        time.sleep(0.2)
        os.system('clear')

class Calculator:

    def __init__(self, master):
        self.master = master
        master.title("super useful calculator :o)")

        self.actions = 1

        self.total = 0
        self.entered_number = 0

        self.total_label_text = IntVar()
        self.total_label_text.set(str(self.total))
        self.total_label = Label(master, textvariable=self.total_label_text)

        self.label = Label(master, text="Result:")

        vcmd = master.register(self.validate) # we have to wrap the command
        self.entry = Entry(master, validate="key", validatecommand=(vcmd, '%P'))

        self.null_button = Button(master, text="0", command=lambda: self.update(0)).grid(row=7, column=1)
        self.one_button = Button(master, text="1", command=lambda: self.update(1)).grid(row=3, column=0)
        self.two_button = Button(master, text="2", command=lambda: self.update(2)).grid(row=3, column=1)
        self.three_button = Button(master, text="3", command=lambda: self.update(3)).grid(row=3, column=2)
        self.four_button = Button(master, text="4", command=lambda: self.update(4)).grid(row=4, column=0)
        self.five_button = Button(master, text="5", command=lambda: self.update(5)).grid(row=4, column=1)
        self.six_button = Button(master, text="6", command=lambda: self.update(6)).grid(row=4, column=2)
        self.seven_button = Button(master, text="7", command=lambda: self.update(7)).grid(row=5, column=0)
        self.eight_button = Button(master, text="8", command=lambda: self.update(8)).grid(row=5, column=1)
        self.nine_button = Button(master, text="9", command=lambda: self.update(9)).grid(row=5, column=2)

        self.add_button = Button(master, text="+", command=lambda: self.update("add")).grid(row=2, column=0)
        self.sub_button = Button(master, text="-", command=lambda: self.update("sub")).grid(row=2, column=1)
        self.mult_button = Button(master, text="*", command=lambda: self.update("mult")).grid(row=2, column=2)
        self.div_button = Button(master, text="/", command=lambda: self.update("div")).grid(row=2, column=3)
        self.c_button = Button(master, text="clean up stdout", command=lambda: os.system('clear')).grid(row=4, column=5)
        self.reset_button = Button(master, text="CE/E", command=lambda: self.update("reset")).grid(row=3, column=5)
        self.q_button = Button(master, text="gtfo", command=lambda: sys.exit()).grid(row=2, column=5)
        self.c_button = Button(master, text="lul", command=lambda: smileys()).grid(row=5, column=5)

        # LAYOUT
        self.label.grid(row=0, column=0, sticky=W)
        self.total_label.grid(row=0, column=1, columnspan=2, sticky=E)
        self.entry.grid(row=1, column=0, columnspan=3, sticky=W+E)

    def validate(self, new_text):
        if not new_text: # the field is being cleared
            self.entered_number = 0
            return True
        try:
            self.entered_number = int(new_text)
            return True
        except ValueError:
            return False

    def update(self, method):
        print('action: %d: starting update-function:\n\tself.total: %d\n\tmethod: %s' %(self.actions, self.total, str(method)))
        
        if method == "add":
            self.total += self.entered_number
        elif method == "sub":
            self.total -= self.entered_number
        elif method == "mult":
            self.total = self.total * self.entered_number
        elif method == "div":
            self.total = self.total / self.entered_number
        elif type(method) == int:
            self.total = int(str(self.total) + str(method))
        
        else:
            self.total = 0

        self.total_label_text.set(self.total)
        self.entry.delete(0, END)
        print('action: %d: done with update-function:\n\tself.total: %d\n\tmethod: %s\n' %(self.actions, self.total, str(method)))
        actions =+ 1

root = Tk()
my_gui = Calculator(root)
root.mainloop()