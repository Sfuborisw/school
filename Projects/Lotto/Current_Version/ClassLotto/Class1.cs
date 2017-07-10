using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System;
using System.Collections.Generic;
using System.Drawing;


namespace ClassLotto
{
    public class LottoMGM
    {
        private List<int> losungsListe = new List<int>();
        private List<int> ziehungsListe = new List<int>();
        private List<string> ergebnisListe = new List<string>();
        private string dieseZahl = "";
        private string ergebnisText = "";
        private int hitCount = 0;
        private string fazit = "";

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

        public List<string> ErgebnisListe
        {
            get => ergebnisListe;
            set => ergebnisListe = value;
        }

        public string ErgebnisText
        {
            get => ergebnisText;
            set => ergebnisText = value;
        }

        public string Ziehung()
        {
            if (this.losungsListe.Count == 6)
            {
                while (this.ziehungsListe.Count < 6)
                {
                    Random r = new Random();
                    int thisRand = r.Next(1, 50);
                    if (!(this.ziehungsListe.Contains(thisRand)))
                    {
                        this.ziehungsListe.Add(thisRand);
                    }
                }

                this.ergebnisText += "Gezogene Zahlen:\n";
                foreach (var x in this.ziehungsListe)
                {
                    this.ergebnisText += Convert.ToString(x) + " ";
                }

                this.ergebnisText += "\nDeine Auswahl:\n";
                foreach (var x in this.losungsListe)
                {
                    if (ziehungsListe.Contains(x))
                    {
                        this.ergebnisText += Convert.ToString(x) + "-Blumentopf! ";
                        this.ergebnisListe.Add("-" + Convert.ToString(x) + "-");
                    }
                    else
                        {
                        this.ergebnisText += Convert.ToString(x) + "-Niete! ";
                        this.ergebnisListe.Add("-" + Convert.ToString(x) + "-");
                    }
                }

                if (hitCount > 0)
                {
                    this.fazit = "\nIts something o/";
                }
                else if (hitCount < 2)
                {
                    this.fazit = "\nMehr Glück beim nächsten mal!";
                }
                else if(hitCount <5)
                {
                    this.fazit = "\nDamn das pretty good!";
                }
                else
                {
                    this.fazit = "\nYou should literally spend money on this!";
                }

                this.ergebnisText += this.fazit;
                return this.ergebnisText;
            }

        else
            {
                string wentbad = "wat";
                return wentbad;
            }
        }
    }
}
