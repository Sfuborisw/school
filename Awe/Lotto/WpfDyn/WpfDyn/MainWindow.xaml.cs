using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;



PROGRAMMABLAUF:


1) Default-GUI wird generiert(statischer Inhalt, immer gleiche Buttons usw)

2) Innerhalb des 'numberfields' kann der User auf Zahlen klicken.

3) OnClick wird geprüft:
-auf wie viele Zahlen im aktuellen Durchlauf bereits geklickt wurde.Liegt die Zahl unter 6
-und wurde die angeklickte Zahl noch nicht angeklickt

4) wird die vom Button gehaltene value in ein array 'LosungsArray' übernommen.
(Anhand der Länge dieses Arrays wird auch festgestellt, auf wie viele Zahlen im aktuellen Durchlauf bereits geklickt wurde.)

5. Sobald das LosungsArray 6 Werte hält, wird die Ziehungsfunktion ausgeführt:
-generiert 6 individuelle rand-Zahlen in range 0-50
-speichert die gelosten Zahlen in Array
-vergleicht bitweise jedes Element des Wahlarrays mit jedem Element des Losungsarrays,
und trägt die Value des Losungsarrays je nach Treffer oder nicht koloriert als String ins Winnerarray ein,
-Deklaration des Rückgabewertes: Winnerarray + kommentierender Satz(1-7 Treffer)
-Lb1.Content = Rückgabewert(Jede angeklickte Zahl bleibt an Ort und Stelle, aber nach der Losung ist sie je nach Treffer oder nicht eingefärbt, und es gibt ein Fazit unter den gewählten Zahlen)

6. Wird der 'neue Runde' Button geklickt, wird die history() funktion ausgeführt, die das WinnerArray archiviert, die arrays wiped, und die Statistik-GUI füllt

7. Statisik-GUI: Zeigt die Ergebnisse der letzten 5 Runden, eine insg.Trefferquote usw usf. =)

8. gg?


namespace WpfDyn
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
        List<int> LosungsListe = new List<int>();
        List<int> ZiehungsListe = new List<int>();
        Button[] b;

        public void Ziehung()
        {
            if (LosungsListe.Count < 6)
            {
                for (int i = 0; i < 6; i++)
                {
                    Random r = new Random();
                    int thisRand = r.Next(1, 50);
                    if (!(ZiehungsListe.Contains(thisRand)))
                    {
                        ZiehungsListe.Add(thisRand);
                    }
                }
            }

        }
        public MainWindow()
            {
                InitializeComponent();
                b = new Button[49];
                for (int i = 0; i < 49; i++)
                {
                    b[i] = new Button();
                    b[i].Name = "bt" + Convert.ToString(i + 1);
                    b[i].Height = 20;
                    b[i].Width = 20;
                    b[i].Background = Brushes.LightGray;
                    b[i].Content = Convert.ToString(i + 1);
                    WrapPanel1.Children.Add(b[i]);
                    b[i].Click += new RoutedEventHandler(bt_Click);
                }


            }
            private void bt_Click(object sender, RoutedEventArgs e)
            {
                if (LosungsListe.Count < 6)
                {
                    if (!(LosungsListe.Contains(Convert.ToInt16(((Button)sender).Content))))
                    {
                        LosungsListe.Add(Convert.ToInt16(((Button)sender).Content));
                        ((Button)sender).Background = Brushes.Red;
                        lb1.Content = lb1.Content + " " + ((Button)sender).Content;
                        Ziehung();
                    }
                }
            }

            private void btClear_Click(object sender, RoutedEventArgs e)
            {
                for (int i = 0; i < 49; i++)
                {
                    b[i].Background = Brushes.LightGray;
                }
                lb1.Content = "";
            }
        }
    }

}
