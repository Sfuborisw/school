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

namespace LottoGame
{
    /// <summary>
    /// Interaction logic for Game.xaml
    /// </summary>
    public partial class Game : Window
    {
        Button[] b;
        public Game()
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
            ((Button)sender).Background = Brushes.Red;
            lb1.Content = lb1.Content + " - " + ((Button)sender).Content;
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
