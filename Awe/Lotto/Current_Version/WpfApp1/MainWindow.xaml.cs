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
using ClassLotto;
using System.Drawing;

namespace WpfDyn
{
    public partial class MainWindow : Window
    {
        Button[] b;
        LottoMGM lotto;
        List<string> statistikListe = new List<string>();
    
        public MainWindow()
        {
            var Fill = new SolidColorBrush(Color.FromArgb(16, 16, 16, 1));
            lotto = new LottoMGM();
            InitializeComponent();
            b = new Button[49];
            for (int i = 0; i < 49; i++)
            {
                b[i] = new Button();
                b[i].Name = "bt" + Convert.ToString(i + 1);
                b[i].Height = 44;
                b[i].Width = 144;
                b[i].Background = Fill;
                b[i].Foreground = Brushes.WhiteSmoke;
                b[i].Content = Convert.ToString(i + 1);
                b[i].FontSize = 18;
                WrapPanel1.Children.Add(b[i]);
                b[i].Click += new RoutedEventHandler(bt_Click);
            }
        }

        private void bt_Click(object sender, RoutedEventArgs e)
        {
            if (lotto.LosungsListe.Count < 6)
            {
                if (!(lotto.LosungsListe.Contains(Convert.ToInt16(((Button)sender).Content))))
                {
                    var BlueFill = new SolidColorBrush(Color.FromRgb(23, 147, 209));
                    lotto.LosungsListe.Add(Convert.ToInt16(((Button)sender).Content));
                    ((Button)sender).Background = BlueFill;
                    lb1.Content = lb1.Content + " " + ((Button)sender).Content;
                    string tempErgebnis = lotto.Ziehung();
                    if (!(tempErgebnis == "wat"))
                    lb1.Content = tempErgebnis;
                    //Archivierung der Liste:
                    foreach (var x in lotto.ErgebnisListe)
                    {
                        statistikListe.Add(x);
                    }
                }
            }
        }

        private string statistik()
        {
            string historyGUI = "";
            //Formattierung der Statistik
            //Anzahl von erfassten Elementen
            int statLength = statistikListe.Count;
            //Beginn des 'Blockes' der letzten Losung
            int statIndex = statistikListe.Count - 6;
            int roundsPlayed = statLength / 6;

            for (int rp = 1; rp <= roundsPlayed; rp++)
            {
                historyGUI += "\nYour " + Convert.ToString(rp) + "-last game:\n";
                for (int i = statIndex; i < statIndex + 6; i++)
                {
                    historyGUI += statistikListe[i];
                }
                statIndex -= 6;
            }
            return historyGUI;
        }

        private void btClear_Click(object sender, RoutedEventArgs e)
        {
            //'Wipen' der Listen und tempStrings
            lb1.Content = "";
            lotto.LosungsListe.Clear();
            lotto.ZiehungsListe.Clear();
            lotto.ErgebnisListe.Clear();
            lotto.ErgebnisText = "";
            //Zurücksetzen der Buttonfarbe
            var Fill = new SolidColorBrush(Color.FromArgb(16, 16, 16, 1));
            foreach (var x in b)
            {
                x.Background = Fill;
            }
            statistik();
        }

        private void statButton_Click(object sender, RoutedEventArgs e)
        {
            MessageBox.Show(statistik());
        }

        private void aboutButton_Click(object sender, RoutedEventArgs e)
        {
            MessageBox.Show("RBZ Technik Kiel\nITF-16-B\n\n'Lotto Game'\n\nAutoren:\n\n    Melvin Treu\n    Maximilian Middeke\n    Franziska Lucas\n\nJuni 2017");
        }
    }
}
