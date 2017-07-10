import math
Volt = 0
Ampere = 0
Ohm = 0
Resistance = 0
Leiterl = 0
Leiterq = 0
SpezR = 0

def decider():
    global Volt, Ampere, Ohm, Resistance, Leiterl, Leiterq, SpezR
    print "do you want to calculate with Volt/Ampere or with conductor? (V/C)"
    decide = raw_input("\n>")
    if "V" in decide:
        print "do you know the Resistance R? (Y/N)"
        knowr = raw_input("\n>")
        if "Y" in knowr:
            Resistance = float(raw_input("\n>R:"))
            Volt = Resistance * Ampere
            Ampere = Resistance / Volt
        knowA = "do you know the ampere-value A? (Y/N)?"
        if "Y" in knowA:
            Ampere = float(raw_input("\n>A:"))
            Resistance = Volt / Ampere
            Volt = Resistance / Ampere
            print "Ampere: ", Ampere
        knowV = "do you know the Voltage? (Y/N)"
        if "Y" in knowV:
            Volt = float(raw_input("\n>V:"))
            print "Volt: ", Volt
            Ampere = Resistance * Volt
            Resistance = Volt / Ampere
    elif C in decide:
        print "do you know the special resistance (Y/N)?"
        knowsr = raw_input("\n>:")
        if "Y" in knowsr:
            SpezR = float(raw_input("\n>sr:"))
            Resistance = (SpezR * Leiterl) / Leiterq
            Leiterq = (SpezR * Leiterl) / Resistance
        print "do you know the conductor-length (Y/N)?"
        knowcl = raw_input("\n>:")
        if "Y" in knowcl:
            Leiterl = float(raw_input("\n>LL:"))
            Resistance = (SpezR * Leiterl) / Leiterq
            Leiterq = (SpezR * Leiterl) / Resistance
        print "do you know the Leiterquerchnitt (Y/N)?"
        knowLq = raw_input("\n>")
        if "Y" in knowLQ:
            Leiterq = float(raw_input("\n>LQ:"))
            Resistance = (SpezR * Leiterl) / Leiterq
    print "Volt: ", Volt
    print "Ampere: ", Ampere
    print "Resistance: ", Resistance
    decider()
decider()


