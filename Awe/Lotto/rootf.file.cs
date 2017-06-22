private void frmLotto_Load(object sender, EventArgs e)

{

    int c = 1000;

    int[] numb = new int[c];

    DateTime dt = new DateTime();

    dt = DateTime.Now;

    Random rnd = new Random(dt.Millisecond);

    for (int i = 1; i < c; i++)

    {

        numb[i] = rnd.Next(1, 50);

    }

    Array.Sort(numb);

    int k = 0;

    int j = 0;

    for (int i = 0; i < c - 1; i++)

    {

        if (numb[i] == numb[i + 1])

        {

            result[k] = numb[i];

            lottonumbers[k] = j += 1;

        }

        else

        {

            k += 1;

            j = 0;

        }

    }

    //sort all of the numbers

    Array.Sort(lottonumbers, result);

    // first display numbers unsorted

    fnDisplay6NumbersUnsorted();

    //get the date of today

    DateTime dt1 = DateTime.Today;

    //display date

    this.labelDaytime.Text = dt1.ToLongDateString();

    //display which draw number

    this.label4.Text = n_draw.ToString();

    //donÂ´t show text "sorted:"

    this.labelSort.Visible = false;

    this.pbNextDraw.Focus();

}

private void fnDisplay6NumbersUnsorted()

{

    this.textBox1.Text = result[49].ToString();

    this.textBox2.Text = result[48].ToString();

    this.textBox3.Text = result[47].ToString();

    this.textBox4.Text = result[46].ToString();

    this.textBox5.Text = result[45].ToString();

    this.textBox6.Text = result[44].ToString();

}

The algorithm starts by the PCs millisecond and then the numbers going through between 1-49 are sorted in an array by number from lowest to highest. In the second loop: how many times a number appears in the array that number is then stored sorted in another array. (Number appearing the least to number appearing the most) Finally the last 6 numbers(the six most picked) of the array are displayed.

Here is the code snippet for the button "Sort numbers" if clicked.

 

private void pbSort_Click(object sender, EventArgs e)

{

    //call the methode to sort

    fnDisplay6NumbersSorted();

    //disable the sort pushbutton

    this.pbSort.Enabled = false;

    //enable the sort Label "sorted"

    this.labelSort.Visible = true;

    this.pbNextDraw.Focus();

}


private void fnDisplay6NumbersSorted()

{

    //temporary array

    int[] nr = new int[6];

    //put all 6 numbers from TextBoxes into one array

    nr[0] = Convert.ToInt16(this.textBox1.Text);

    nr[1] = Convert.ToInt16(this.textBox2.Text);

    nr[2] = Convert.ToInt16(this.textBox3.Text);

    nr[3] = Convert.ToInt16(this.textBox4.Text);

    nr[4] = Convert.ToInt16(this.textBox5.Text);

    nr[5] = Convert.ToInt16(this.textBox6.Text);

    //sort the new temporary array nr

    Array.Sort(nr);

    //now assign the 6 numbers from the new array nr to all TextBoxes and display

    this.textBox1.Text = nr[0].ToString();

    this.textBox2.Text = nr[1].ToString();

    this.textBox3.Text = nr[2].ToString();

    this.textBox4.Text = nr[3].ToString();

    this.textBox5.Text = nr[4].ToString();

    this.textBox6.Text = nr[5].ToString();

}