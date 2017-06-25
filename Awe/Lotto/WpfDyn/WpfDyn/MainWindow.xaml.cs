using System;
using System.Collections;
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
/*

PROGRAMMABLAUF:


1) Default-GUI wird generiert (statischer Inhalt, immer gleiche Buttons usw)

2) Innerhalb des 'numberfields' kann der User auf Zahlen klicken.

3) OnClick wird geprüft:
-auf wie viele Zahlen im aktuellen Durchlauf bereits geklickt wurde. Liegt die Zahl unter 6
-und wurde die angeklickte Zahl noch nicht angeklickt

4) wird die vom Button gehaltene value in ein array 'LosungsArray' übernommen.
(Anhand der Länge dieses Arrays wird auch festgestellt, auf wie viele Zahlen im aktuellen Durchlauf bereits geklickt wurde.)

*/

namespace WpfDyn
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : Window
    {
       // List<int> LosungsListe = new List<int>();
        //List<int> ZiehungsListe = new List<int>();
        Button[] b;
        LottoMGM lotto;
        public MainWindow()
            {
                lotto = new LottoMGM();
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
                if (lotto.LosungsListe.Count < 6)
                {
                    if (!(lotto.LosungsListe.Contains(Convert.ToInt16(((Button)sender).Content))))
                    {
                        lotto.LosungsListe.Add(Convert.ToInt16(((Button)sender).Content));
                        ((Button)sender).Background = Brushes.Red;
                        lb1.Content = lb1.Content + " " + ((Button)sender).Content;
                        lotto.Ziehung();
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
