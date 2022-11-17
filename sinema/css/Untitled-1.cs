import javax swing.*;
public class Daire()
{
static int yaricap;
static int alan;
}
static void oku(){
    string input= JoptionPane.ShowInputDialog(null,"Bir tam sayı gir: " , "Tam sayı girişi ", JoptionPane.Question_Message);
    int deg= Integer.ParseInt(input);
    yaricap=deg;
}
public static double AlanHesapla(){
    return alan = 3.14*yaricap*yaricap;
}

public static void main(String args[])
{
    oku();
    System.out.println("Yarı Çap: " + yaricap);
    System.out.println("Alan = " + AlanHesapla());
}
}




//stored procedure
ALTER PROCEDURE adisoyadi @Adi varchar(50)                    
AS select adisoyadi from ogrenciler where adisoyadi like @Adi+ '%'
    RETURN
 
//c# kod
using system.data.sqlclint//kütüphane

public void Listele()
        {
            SqlConnection baglanti = new SqlConnection("Data Source=.\\SQLEXPRESS; bla bla bla ");
            baglanti.Open();
            SqlCommand calistir = new SqlCommand();
            calistir.Connection = baglanti;
            calistir.CommandText = "adisoyadi";
            calistir.CommandType = CommandType.StoredProcedure;                                   
            calistir.Parameters.AddWithValue("@Adi", textbox1.text);    
            calistir.ExecuteNonQuery(); 
            sqldataadapter da= new sqldataadapter(calistir);
            datatable dt= new datatable();
            da.fill(dt);
            datagridwiew1.datasource=dt;                               
            baglanti.Close();
        }
        form1_Load(){
                listele();
        }


//2
gazidataDBEntities db = new gazidataDBEntities();
 dataGridView1.DataSource = from ogrenciler in DbConnect.DbCon.ogrenciler
                                            orderby ogrenciler.dogumtarihi descending
                                            select new
                                            {
                                               ogrenciler.dogumtarihi,
                                               ogrenciler.adisoyadi
                                            } 
1-Çözüm Gezgini penceresinde modeller klasörüne sağ tıklayın ve menü seçeneğini ekle, yeni öğe' yi seçin.
2-Yeni öğe Ekle Iletişim kutusunda veri kategorisini seçin
3-ADO.NET varlık veri modeli şablonunu seçin, gazidataDBModel.edmx adını varlık veri modeli verin ve Ekle düğmesine tıklayın. 
Ekle düğmesine tıkladığınızda veri modeli Sihirbazı başlatılır.
4-Model Içeriğini seçin adımında, bir veritabanından oluştur seçeneğini belirleyin ve Ileri düğmesine tıklayın.
5-Veri bağlantınızı seçin adımında, gazidataDB. mdf veritabanı bağlantısını seçin, varlıklar bağlantı ayarları adı gazidataDBEntities
 yazın ve İleri düğmesine tıklayın
6-Veritabanı nesnelerinizi seçin adımında, film veritabanı tablosunu seçin ve son düğmesine tıklayın