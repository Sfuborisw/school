class Rechner():

    def __init__self(self):

        pass

    def rechnen(self, zahl1=2, zahl2=3, operator='*'):

        self.zahl1 = zahl1
        self.zahl2 = zahl2

        if operator == '+':
            self.ergebnis = self.zahl1 + self.zahl2

        elif operator == '-':
            self.ergebnis = self.zahl1 - self.zahl2

        elif operator == '*':
            self.ergebnis = self.zahl1 * self.zahl2

        elif operator == '/':
            self.ergebnis = self.zahl1 / self.zahl2

        return(self.ergebnis)