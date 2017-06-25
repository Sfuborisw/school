using System;
using System.Collections.Generic;
using System.Drawing;


namespace ClassLotto
{

    /*
    -vergleicht bitweise jedes Element des Wahlarrays mit jedem Element des Losungsarrays,
    und trägt die Value des Losungsarrays je nach Treffer oder nicht koloriert als String ins Winnerarray ein,

    -Deklaration des Rückgabewertes: Winnerarray + kommentierender Satz (1-7 Treffer)

    -Lb1.Content = Rückgabewert (Jede angeklickte Zahl bleibt an Ort und Stelle, aber nach der Losung ist sie je nach Treffer oder nicht eingefärbt, und es gibt ein Fazit unter den gewählten Zahlen)

    6. Wird der 'neue Runde' Button geklickt, wird die history() funktion ausgeführt, die das WinnerArray archiviert, die arrays wiped, und die Statistik-GUI füllt

    7. Statisik-GUI: Zeigt die Ergebnisse der letzten 5 Runden, eine insg. Trefferquote usw usf. =)


    public void ergebnisColor(Color highlightColor, string ergebnisZahl)
            {
                zahlFarbe = highlightColor;
                meineZahl = ergebnisZahl;
            }
            public Color zahlFarbe { get; set; }
            public string meineZahl { get; set; }

    stackoverflow.com/questions/1926264/color-different-parts-of-a-richtextbox-string


    */

    public class LottoMGM
    {
        private List<int> losungsListe = new List<int>();
        private List<int> ziehungsListe = new List<int>();
        private List<string> ergebnisListe = new List<string>();
        private string dieseZahl = "";

        public List<int> LosungsListe
        {
            get => losungsListe;
            set => losungsListe = value;
        }

        public List<int> ZiehungsListe
        {
            get => ziehungsListe;
            set => ziehungsListe = value;
        }

        public void Ziehung()
        {
            if (this.losungsListe.Count < 6)
            {
                for (int i = 0; i < 6; i++)
                {
                    Random r = new Random();
                    int thisRand = r.Next(1, 50);
                    if (!(this.ziehungsListe.Contains(thisRand)))
                    {
                        this.ziehungsListe.Add(thisRand);
                        if (this.losungsListe.Contains(thisRand))
                            {
                            dieseZahl = Convert.ToString(thisRand);
                            dieseZahl += " ";

                            }
                    }
                }

            }

            //.Intersect<TSource>-Methode: (IEnumerable<TSource>, IEnumerable<TSource>)

        }

    }
}
