<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_laporan extends CI_Model {


  function namaBulan($bulan)
  {
    if ($bulan == 1)
    {
        return "Januari";
    }
    else if($bulan == 2)
    {
        return "Febuari";
    }
    else if($bulan == 3)
    {
        return "Maret";
    }
    else if($bulan == 4)
    {
        return "April";
    }
    else if($bulan == 5)
    {
        return "Mei";
    }
    else if($bulan == 6)
    {
      return "Juni";
    }
    else if($bulan == 7)
    {
      return "Juli";
    }
    else if($bulan == 8)
    {
      return "Agustus";
    }
    else if($bulan == 9)
    {
      return "September";
    }
    else if($bulan == 10)
    {
      return "Oktober";
    }
    else if($bulan == 11)
    {
      return "November";
    }
    else if($bulan == 12)
    {
      return "Desember";
    }
  }
  
  public function pdf_jurnal($tahun, $bulan)
  {    
     $hasil = "";
     $nama_perusahaan="";
     $jenis_proyek="";
     $deskripsi="";
        /*
        foreach($get->result() as $g)
        {
           $nama_perusahaan=$g->nama_perusahaan;
           $jenis_proyek=$g->nama_jenis_proyek;
           $deskripsi=$g->deskripsi_proyek;
        }
        */
           $nama_perusahaan="PT. Indoline";
           //$jenis_proyek=$g->nama_jenis_proyek;
           //$deskripsi=$g->deskripsi_proyek;
                             
        
        $hasil .= '
            <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
                font-size:12px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }

            p {
              font-family: arial, sans-serif;
                font-size: 12px;
            }
            h1 {
              font-family: arial, sans-serif;
                font-size: 20px;
            }
            h2 {
              font-family: arial, sans-serif;
                font-size: 18px;
            }
            p.fourtabs {
                tab-size:4;
                -moz-tab-size: 4;
                -o-tab-size:  4;
              white-space: pre-wrap;
            }
            </style>
            <h1><center>PT. INDOLINE INCOMEKITA<center></h1>
            <h1><center>Jurnal Periode '.$this->namaBulan($bulan).' '.$tahun.'<center></h1>
            <table>
              <thead>
                  <tr>
                      <th>Nama Akun</th>
                      <th>Debit</th>
                      <th>Kredit</th>
                  </tr>
              </thead>
              <tbody>';

        $get = $this->db->query("Select ID_JOUR, a.ID_ACT, NAME_SUB_ACCOUNT, DEBIT, CREDIT From journals j, sub_account a 
                              where j.id_act = a.id_act 
                              and MONTH(DATE_INPUT)=$bulan and YEAR(DATE_INPUT)=$tahun
                              order by ID_JOUR
                              ");      
        

        foreach($get->result() as $g)
        {
            $hasil .= '
                <tr>
                    <td class="center">'.$g->NAME_SUB_ACCOUNT.'</td>
                    <td class="center">Rp '.number_format($g->DEBIT,0,".",".") .'</td>
                    <td class="center">Rp '.number_format($g->CREDIT,0,".",".") .'</td>
                </tr>';
            
        }

        $hasil .= "</tbody>";
        $hasil .= "</table>";
        $hasil .= "</div>";
        $hasil .= "</section>";
        return $hasil;
  }

  public function pdf_neracaSaldo($tahun, $bulan)
  {    
     $hasil = "";
     $nama_perusahaan="";
     $jenis_proyek="";
     $deskripsi="";
        /*
        foreach($get->result() as $g)
        {
           $nama_perusahaan=$g->nama_perusahaan;
           $jenis_proyek=$g->nama_jenis_proyek;
           $deskripsi=$g->deskripsi_proyek;
        }
        */
           $nama_perusahaan="PT. Indoline";
           //$jenis_proyek=$g->nama_jenis_proyek;
           //$deskripsi=$g->deskripsi_proyek;
                             
        
        $hasil .= '
            <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
                font-size:12px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }

            p {
              font-family: arial, sans-serif;
                font-size: 12px;
            }
            h1 {
              font-family: arial, sans-serif;
                font-size: 20px;
            }
            h2 {
              font-family: arial, sans-serif;
                font-size: 18px;
            }
            p.fourtabs {
                tab-size:4;
                -moz-tab-size: 4;
                -o-tab-size:  4;
              white-space: pre-wrap;
            }
            </style>
            <h1><center>PT. INDOLINE INCOMEKITA<center></h1>
            <h1><center>Jurnal Periode '.$this->namaBulan($bulan).' '.$tahun.'<center></h1>
            <table>
              <thead>
                  <tr>
                      <th>Nama Akun</th>
                      <th>Debit</th>
                      <th>Kredit</th>
                  </tr>
              </thead>
              <tbody>';

        $get = $this->db->query("select NAME_SUB_ACCOUNT,
                                  (CASE when (SUM(DEBIT) - SUM(CREDIT)) > 0 then (SUM(DEBIT) - SUM(CREDIT)) else 0 end) as DEBIT,
                                    (CASE when (SUM(DEBIT) - SUM(CREDIT)) < 0 then (SUM(DEBIT) - SUM(CREDIT)) else 0 end) as CREDIT
                                from sub_account sa 
                                left outer join journals j on sa.id_act = j.id_act
                                and MONTH(DATE_INPUT)=$bulan and YEAR(DATE_INPUT)=$tahun
                                group by name_sub_account
                                order by id_sub_account;");      
        
        $debit = 0;
        $credit = 0;
        foreach($get->result() as $g)
        {
            $debit = $debit +  $g->DEBIT;
            $credit = $credit +  $g->CREDIT;
            $hasil .= '
                <tr>
                    <td class="center">'.$g->NAME_SUB_ACCOUNT.'</td>
                    <td class="center">Rp '.number_format($g->DEBIT,0,".",".") .'</td>
                    <td class="center">Rp '.number_format($g->CREDIT * -1,0,".",".") .'</td>
                </tr>';
            
        }
            $hasil .= '
                        <tr style="font-weight: bold;">
                            <td class="center">Jumlah</td>
                            <td class="center">Rp '.number_format($debit,0,".",".") .'</td>
                            <td class="center">Rp '.number_format($credit * -1,0,".",".") .'</td>
                        </tr>';

        $hasil .= "</tbody>";
        $hasil .= "</table>";
        $hasil .= "</div>";
        $hasil .= "</section>";
        return $hasil;
  }

  public function pdf_labaRugi($tahun, $bulan)
  {    
     $hasil = "";
     $nama_perusahaan="";
     $jenis_proyek="";
     $deskripsi="";
        /*
        foreach($get->result() as $g)
        {
           $nama_perusahaan=$g->nama_perusahaan;
           $jenis_proyek=$g->nama_jenis_proyek;
           $deskripsi=$g->deskripsi_proyek;
        }
        */
           $nama_perusahaan="PT. Indoline";
           //$jenis_proyek=$g->nama_jenis_proyek;
           //$deskripsi=$g->deskripsi_proyek;
                             
        
        $hasil .= '
            <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
                font-size:12px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }

            p {
              font-family: arial, sans-serif;
                font-size: 12px;
            }
            h1 {
              font-family: arial, sans-serif;
                font-size: 20px;
            }
            h2 {
              font-family: arial, sans-serif;
                font-size: 18px;
            }
            p.fourtabs {
                tab-size:4;
                -moz-tab-size: 4;
                -o-tab-size:  4;
              white-space: pre-wrap;
            }
            </style>
            <h1><center>PT. INDOLINE INCOMEKITA<center></h1>
            <h1><center>Laba Rugi Periode '.$this->namaBulan($bulan).' '.$tahun.'<center></h1>
            <table>
              <thead>
                  <tr>
                      <th>Nama Akun</th>
                      <th>Debit</th>
                      <th>Kredit</th>
                  </tr>
              </thead>
              <tbody>';

        $get = $this->db->query("select NAME_SUB_ACCOUNT,
                                (CASE when (SUM(DEBIT) - SUM(CREDIT)) > 0 then (SUM(DEBIT) - SUM(CREDIT)) else 0 end) as DEBIT,
                                (CASE when (SUM(DEBIT) - SUM(CREDIT)) < 0 then (SUM(DEBIT) - SUM(CREDIT)) else 0 end) as CREDIT
                              from sub_account sa 
                              inner join account_category ac on ac.ID_ACCOUNT_CATEGORY = sa.ID_ACCOUNT_CATEGORY
                              left outer join journals j on sa.id_act = j.id_act
                              and MONTH(DATE_INPUT)=$bulan and YEAR(DATE_INPUT)=$tahun
                              WHERE ac.ID_ACCOUNT_CATEGORY = 4 OR ac.ID_ACCOUNT_CATEGORY = 5
                              group by name_sub_account
                              order by id_sub_account;");      
        
        $debit = 0;
        $credit = 0;
        foreach($get->result() as $g)
        {
            $debit = $debit +  $g->DEBIT;
            $credit = $credit +  $g->CREDIT;
            $hasil .= '
                <tr>
                    <td class="center">'.$g->NAME_SUB_ACCOUNT.'</td>
                    <td class="center">Rp '.number_format($g->DEBIT,0,".",".") .'</td>
                    <td class="center">Rp '.number_format($g->CREDIT * -1,0,".",".") .'</td>
                </tr>';
            
        }
            $hasil .= '
                        <tr style="font-weight: bold;">
                            <td class="center">Total </td>
                            <td class="center"></td>
                            <td class="center">Rp '.number_format(($credit * -1) - $debit,0,".",".") .'</td>
                        </tr>';

        $hasil .= "</tbody>";
        $hasil .= "</table>";
        $hasil .= "</div>";
        $hasil .= "</section>";
        return $hasil;
  }

  public function pdf_neraca($tahun, $bulan)
  {    
     $hasil = "";
     $nama_perusahaan="";
     $jenis_proyek="";
     $deskripsi="";
        /*
        foreach($get->result() as $g)
        {
           $nama_perusahaan=$g->nama_perusahaan;
           $jenis_proyek=$g->nama_jenis_proyek;
           $deskripsi=$g->deskripsi_proyek;
        }
        */
           $nama_perusahaan="PT. Indoline";
           //$jenis_proyek=$g->nama_jenis_proyek;
           //$deskripsi=$g->deskripsi_proyek;
                             
        
        $hasil .= '
            <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid;
                text-align: left;
                padding: 8px;
                font-size:12px;
            }

            p {
              font-family: arial, sans-serif;
                font-size: 12px;
            }
            h1 {
              font-family: arial, sans-serif;
                font-size: 20px;
            }
            h2 {
              font-family: arial, sans-serif;
                font-size: 18px;
            }
            p.fourtabs {
                tab-size:4;
                -moz-tab-size: 4;
                -o-tab-size:  4;
              white-space: pre-wrap;
            }
            .container {
               height: auto;
               overflow: hidden;
            }

            .left {
                width: 250px;
                float: left;
                
                font-size:14px;
            }

            .right {
                float: none; /* not needed, just for clarification */
              
                font-size:14px;
                /* the next props are meant to keep this block independent from the other floated one */
                width: auto;
                overflow: hidden;
            }​​
            </style>
			<h1><center>PT. INDOLINE INCOMEKITA<center></h1>
            <h1><center>Neraca Periode '.$this->namaBulan($bulan).' '.$tahun.'<center></h1>
            <table>
              <tbody>';

        $aktiva = $this->db->query("select ID_SUB_ACCOUNT, NAME_SUB_ACCOUNT,
                                  SUM(DEBIT) - SUM(CREDIT) as saldo
                                from sub_account sa 
                                inner join account_category ac on ac.ID_ACCOUNT_CATEGORY = sa.ID_ACCOUNT_CATEGORY
                                inner join journals j on sa.id_act = j.id_act
                                and MONTH(DATE_INPUT)=$bulan and YEAR(DATE_INPUT)=$tahun
                                WHERE ac.ID_ACCOUNT_CATEGORY = 1
                                group by name_sub_account
                                order by sa.id_act asc;");      

         $kewajiban = $this->db->query("select ID_SUB_ACCOUNT, NAME_SUB_ACCOUNT,
                                      SUM(DEBIT) - SUM(CREDIT) as saldo
                                    from sub_account sa 
                                    inner join account_category ac on ac.ID_ACCOUNT_CATEGORY = sa.ID_ACCOUNT_CATEGORY
                                    inner join journals j on sa.id_act = j.id_act
                                    and MONTH(DATE_INPUT)=$bulan and YEAR(DATE_INPUT)=$tahun
                                    WHERE ac.ID_ACCOUNT_CATEGORY = 2
                                    group by name_sub_account
                                    order by sa.id_act asc;");      

         $modal = $this->db->query("select ID_SUB_ACCOUNT, 'Modal Perusahaan' as NAME_SUB_ACCOUNT ,
                                      SUM(DEBIT) - SUM(CREDIT) as saldo
                                    from sub_account sa 
                                    inner join account_category ac on ac.ID_ACCOUNT_CATEGORY = sa.ID_ACCOUNT_CATEGORY
                                    inner join journals j on sa.id_act = j.id_act
                                    and MONTH(DATE_INPUT)=$bulan and YEAR(DATE_INPUT)=$tahun
                                    WHERE ac.ID_ACCOUNT_CATEGORY = 3  or ac.ID_ACCOUNT_CATEGORY = 4  or ac.ID_ACCOUNT_CATEGORY = 5;");      

        $saldoAktiva = 0;
        $saldoKewajiban = 0;
        $saldoModal = 0;
        $credit = 0;
        $hasil .= '
                <tr>
                    <td>';                   
                      foreach($aktiva->result() as $g)
                      {
                          $saldoAktiva = $saldoAktiva +  $g->saldo;
                          $hasil .= '
                              <div class="container">
                                <div class="left">
                                   '.$g->NAME_SUB_ACCOUNT.'
                                </div>
                                <div class="right">
                                     '.number_format($g->saldo,0,".",".").'
                                </div>
                            </div>';                 
                      }

        $hasil .=   '
                      <br>
                      <br>
                      <br>
                      <div class="container">
                                <div class="left"  style="background: bisque;">
                                    Total Aktiva
                                </div>
                                <div class="right"  style="background: bisque;">
                                    '.number_format($saldoAktiva,0,".",".").'
                                </div>
                            </div>


                  </td>';

        $hasil .=  '<td>';
                    foreach($kewajiban->result() as $g)
                      {
                          $saldoKewajiban = $saldoKewajiban +  $g->saldo;
                          $hasil .= '
                              <div class="container">
                                <div class="left">
                                   '.$g->NAME_SUB_ACCOUNT.'
                                </div>
                                <div class="right">
                                    '.number_format($g->saldo*-1,0,".",".").'
                                </div>
                            </div>';                 
                      }
               
        $hasil .=    '     
                          <br>
                          <div class="container">
                                <div class="left"  style="background: aqua;">
                                    Total Kewajiban
                                </div>
                                <div class="right"  style="background: aqua;">
                                    '.number_format($saldoKewajiban*-1,0,".",".").'
                                </div>
                            </div><br><br>';

         
                    foreach($modal->result() as $g)
                      {
                          $saldoModal = $saldoModal +  $g->saldo;
                          $hasil .= '
                            <div class="container">
                                <div class="left"  style="background: aqua;">
                                   '.$g->NAME_SUB_ACCOUNT.'
                                </div>
                                <div class="right"  style="background: aqua;">
                                    '.number_format($g->saldo * -1 ,0,".",".").'
                                </div>
                            </div>';                 
                      }
                
               $hasil .=   '
                            <br>
                            <br>
                            <br>
                            <div class="container">
                                <div class="left"  style="background: bisque;">
                                    Total Kewajiban & Modal
                                </div>
                                <div class="right"  style="background: bisque;">
                                    '.number_format(($saldoKewajiban*-1) + ($saldoModal * -1) ,0,".",".").'
                                </div>
                            </div>
                            



          </td>';
        $hasil .= "</tbody>";
        $hasil .= "</table>";
        $hasil .= "</div>";
        $hasil .= "</section>";
        return $hasil;
  }

  public function pdf_bukuBesar($tahun, $bulan, $id)
  {    
     $hasil = "";
     $nama_perusahaan="";
     $jenis_proyek="";
     $deskripsi="";

        $get = $this->db->query("select  NAME_SUB_ACCOUNT FROM SUB_ACCOUNT WHERE ID_ACT =$id ");

        foreach($get->result() as $g)
        {
           $deskripsi =$g->NAME_SUB_ACCOUNT;
        }
        
           $nama_perusahaan="PT. Indoline";
           //$jenis_proyek=$g->nama_jenis_proyek;
           //$deskripsi=$g->deskripsi_proyek;
                             
        
        $hasil .= '
            <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
                font-size:12px;
            }

            th {
                background-color: #dddddd;
            }

            p {
              font-family: arial, sans-serif;
                font-size: 12px;
            }
            h1 {
              font-family: arial, sans-serif;
                font-size: 20px;
            }
            h2 {
              font-family: arial, sans-serif;
                font-size: 18px;
            }
            p.fourtabs {
                tab-size:4;
                -moz-tab-size: 4;
                -o-tab-size:  4;
              white-space: pre-wrap;
            }
            </style>
            <table>
                  <tr>
                      <td align="center" COLSPAN=2>PT INDOLINE INCOMEKITA</td>
                      <td align="center" COLSPAN=3>BUKU BESAR '.$deskripsi.'</td>
                      <td align="center">Periode '.$this->namaBulan($bulan).' '.$tahun.'</td>
                  </tr>
              <thead>
                  <tr>
                      <th>Tanggal</th>
                      <th>No Bukti</th>
                      <th>Uraian</th>
                      <th>Perkiraan</th>
                      <th>Debit</th>
                      <th>Kredit</th>
                  </tr>
              </thead>
              <tbody>';


        $data_journals = $this->db->query("SELECT ID_JOURNALS FROM JOURNALS 
                                WHERE ID_ACT=$id
                                and MONTH(DATE_INPUT)=$bulan and YEAR(DATE_INPUT)=$tahun
								order by DATE_TRANSACTION;");      

        foreach($data_journals->result() as $d)
        {

            $get = $this->db->query("select concat(ID_SUB_ACCOUNT, ID_SUB2_ACCOUNT, ID_SUB3_ACCOUNT) as ID_SUB_ACCOUNT, DATE_TRANSACTION, NOTE, NOTE_2, NOTE_3,
                        (CASE when (CREDIT) > 0 then CREDIT else 0 end) as CREDIT,
                        (CASE when (DEBIT) > 0 then DEBIT else 0 end) as DEBIT
                        from sub_account sa 
                            inner join account_category ac on ac.ID_ACCOUNT_CATEGORY = sa.ID_ACCOUNT_CATEGORY
                            left outer join journals j on sa.id_act = j.id_act
                        WHERE sa.ID_ACT <> $id
                        AND j.id_journals= '$d->ID_JOURNALS'
                        order by DATE_TRANSACTION 
                        ");      

            $saldo = 0;

            foreach($get->result() as $g)
            {
                $saldo = $saldo + $g->DEBIT - $g->CREDIT;
                $hasil .= '
                    <tr>
                        <td class="center">'.$g->DATE_TRANSACTION.'</td>
                        <td class="center"></td>
                        <td class="center">'.$g->NOTE_3.'</td>
                        <td class="center">'.$g->ID_SUB_ACCOUNT.'</td>
                        <td class="center">Rp '.number_format($g->CREDIT,0,".",".") .'</td>
                        <td class="center">Rp '.number_format($g->DEBIT,0,".",".") .'</td>
                    </tr>';
            }   
        }

        $hasil .= "</tbody>";
        $hasil .= "</table>";
        $hasil .= "</div>";
        $hasil .= "</section>";
        return $hasil;
  }

  public function pdf_perubahanModal($tahun, $bulan)
  {    
     $hasil = "";
     $nama_perusahaan="";
     $jenis_proyek="";
     $deskripsi="";
        
           $nama_perusahaan="PT. Indoline";
           //$jenis_proyek=$g->nama_jenis_proyek;
           //$deskripsi=$g->deskripsi_proyek;
                             
        
        $hasil .= '
            <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
                font-size:12px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }

            p {
              font-family: arial, sans-serif;
                font-size: 12px;
            }
            h1 {
              font-family: arial, sans-serif;
                font-size: 20px;
            }
            h2 {
              font-family: arial, sans-serif;
                font-size: 18px;
            }
            p.fourtabs {
                tab-size:4;
                -moz-tab-size: 4;
                -o-tab-size:  4;
              white-space: pre-wrap;
            }
            </style>
            <h1><center>PT. INDOLINE INCOMEKITA<center></h1>
            <h2><center>Laporan Perubahan Modal<h2>
            <h2><center>Periode '.$this->namaBulan($bulan).' '.$tahun.'<center></h2>
            <table>
              <tbody>';

        $bulan0 = $bulan -1;        
        $modalPertama = $this->db->query("select ID_SUB_ACCOUNT, 'Modal Perusahaan' as NAME_SUB_ACCOUNT ,
                                      SUM(DEBIT) - SUM(CREDIT) as saldo
                                    from sub_account sa 
                                    inner join account_category ac on ac.ID_ACCOUNT_CATEGORY = sa.ID_ACCOUNT_CATEGORY
                                    inner join journals j on sa.id_act = j.id_act
                                    and MONTH(DATE_INPUT)<$bulan and YEAR(DATE_INPUT)=$tahun
                                    WHERE ac.ID_ACCOUNT_CATEGORY = 3  or ac.ID_ACCOUNT_CATEGORY = 4  or ac.ID_ACCOUNT_CATEGORY = 5;");      

        $modalDisetor = $this->db->query("select ID_SUB_ACCOUNT, 'Modal Perusahaan' as NAME_SUB_ACCOUNT ,
                              SUM(DEBIT) - SUM(CREDIT) as saldo
                            from sub_account sa 
                            inner join account_category ac on ac.ID_ACCOUNT_CATEGORY = sa.ID_ACCOUNT_CATEGORY
                            inner join journals j on sa.id_act = j.id_act
                            and MONTH(DATE_INPUT)=$bulan and YEAR(DATE_INPUT)=$tahun
                            WHERE ac.ID_ACCOUNT_CATEGORY = 3;");      


        $modalAkhir = $this->db->query("select ID_SUB_ACCOUNT, 'Modal Perusahaan' as NAME_SUB_ACCOUNT ,
                                      SUM(DEBIT) - SUM(CREDIT) as saldo
                                    from sub_account sa 
                                    inner join account_category ac on ac.ID_ACCOUNT_CATEGORY = sa.ID_ACCOUNT_CATEGORY
                                    inner join journals j on sa.id_act = j.id_act
                                    and MONTH(DATE_INPUT)=$bulan and YEAR(DATE_INPUT)=$tahun
                                    WHERE ac.ID_ACCOUNT_CATEGORY = 3  or ac.ID_ACCOUNT_CATEGORY = 4  or ac.ID_ACCOUNT_CATEGORY = 5;");      

        $labaRugi = $this->db->query("select NAME_SUB_ACCOUNT,
                                SUM(DEBIT) - SUM(CREDIT) as saldo
                              from sub_account sa 
                              inner join account_category ac on ac.ID_ACCOUNT_CATEGORY = sa.ID_ACCOUNT_CATEGORY
                              left outer join journals j on sa.id_act = j.id_act
                              and MONTH(DATE_INPUT)=$bulan and YEAR(DATE_INPUT)=$tahun
                              WHERE ac.ID_ACCOUNT_CATEGORY = 4 OR ac.ID_ACCOUNT_CATEGORY = 5;");      
        

        $saldo = 0;
        $perubahanModal1= 0;
        $perubahanModal = 0;
        foreach($modalPertama->result() as $g)
        {
          $perubahanModal1 = $perubahanModal1 + ($g->saldo * -1);
            $hasil .= '
                <tr>
                    <td class="center">Modal Awal '.$this->namaBulan($bulan).'</td>
                    <td class="center"></td>
                    <td class="center">Rp '.number_format($g->saldo*-1,0,".",".") .'</td>
                </tr>';
            
        }

        foreach($labaRugi->result() as $g)
        {
            $perubahanModal = $perubahanModal + ($g->saldo * -1);
            $hasil .= '
                <tr>
                    <td class="center">Laba Bersih</td>
                    <td class="center">Rp '.number_format($g->saldo * -1,0,".",".") .'</td>
                    <td class="center"></td>
                </tr>';
            
        }

        foreach($modalDisetor->result() as $g)
        {
            $perubahanModal = $perubahanModal + ($g->saldo * -1);
            $hasil .= '
                <tr>
                    <td class="center">Modal Disetor</td>
                    <td class="center"></td>
                    <td class="center">Rp '.number_format($g->saldo * -1,0,".",".") .'</td>
                </tr>';
            
        }

        $hasil .= '
                <tr>
                    <td class="center">Penambahan Modal</td>
                    <td class="center"></td>
                    <td class="center">Rp '.number_format($perubahanModal,0,".",".") .'</td>
                </tr>';

        $saldo = $perubahanModal1 + $perubahanModal;        
        $hasil .= '
                <tr>
                    <td class="center">Modal Akhir '.$this->namaBulan($bulan).'</td>
                    <td class="center"></td>
                    <td class="center">Rp '.number_format($saldo,0,".",".") .'</td>
                </tr>';        


        $hasil .= "</tbody>";
        $hasil .= "</table>";
        $hasil .= "</div>";
        $hasil .= "</section>";
        return $hasil;
  }

  public function pdf_arusKas($tahun, $bulan)
  {    
     $hasil = "";
     $nama_perusahaan="";
     $jenis_proyek="";
     $deskripsi="";
        
           $nama_perusahaan="PT. Indoline";
           //$jenis_proyek=$g->nama_jenis_proyek;
           //$deskripsi=$g->deskripsi_proyek;
                             
        
        $hasil .= '
            <style>
            table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
                font-size:12px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }

            p {
              font-family: arial, sans-serif;
                font-size: 12px;
            }
            h1 {
              font-family: arial, sans-serif;
                font-size: 20px;
            }
            h2 {
              font-family: arial, sans-serif;
                font-size: 18px;
            }
            p.fourtabs {
                tab-size:4;
                -moz-tab-size: 4;
                -o-tab-size:  4;
              white-space: pre-wrap;
            }
            </style>
            <h1><center>PT. INDOLINE INCOMEKITA<center></h1>
            <h2><center>Laporan Arus Kas<h2>
            <h2><center>Periode '.$this->namaBulan($bulan).' '.$tahun.'<center></h2>
            <table>
              <tbody>';

        $bulan0 = $bulan -1; 
        $idKas = $this->get_idSettingKas();       
        $arusKas0 = $this->db->query("
                                      select(SELECT NAME_SUB_ACCOUNT FROM JOURNALS J2, SUB_ACCOUNT SA WHERE J2.ID_ACT=SA.ID_ACT AND J.ID_JOURNALS=ID_JOURNALS 
                                      AND SA.name_sub_account not like '%kas%') AS NAME_SUB_ACCOUNT, 
                                      SUM(DEBIT) - SUM(CREDIT) as saldo
                                      from journals j, sub_account sa where sa.id_act=j.id_act and  sa.name_sub_account like '%kas%'
                                      and MONTH(DATE_INPUT)<$bulan and YEAR(DATE_INPUT)=$tahun;");      

        $arusKas1 = $this->db->query("
                                      select(SELECT NAME_SUB_ACCOUNT FROM JOURNALS J2, SUB_ACCOUNT SA WHERE J2.ID_ACT=SA.ID_ACT AND J.ID_JOURNALS=ID_JOURNALS 
                                      AND SA.name_sub_account not like '%kas%') AS NAME_SUB_ACCOUNT, 
                                      SUM(DEBIT) - SUM(CREDIT) as saldo
                                      from journals j, sub_account sa where sa.id_act=j.id_act and  sa.name_sub_account like '%kas%'
                                      and MONTH(DATE_INPUT)=$bulan and YEAR(DATE_INPUT)=$tahun 
                                      GROUP BY NAME_SUB_ACCOUNT;");              

        $saldoAwal = 0;
        $saldo= 0;
        foreach($arusKas0->result() as $g)
        {
            $saldoAwal = $saldoAwal + $g->saldo;
            $hasil .= '
                <tr>
                    <td class="center">Kas bulan Lalu</td>
                    <td class="center">Rp '.number_format($g->saldo,0,".",".") .'</td>
                </tr>';
            
        }

        foreach($arusKas1->result() as $g)
        {
            $saldo = $saldo + $g->saldo;
            $hasil .= '
                <tr>
                    <td class="center">'.$g->NAME_SUB_ACCOUNT.'</td>
                    <td class="center">Rp '.number_format($g->saldo,0,".",".") .'</td>
                </tr>';
            
        }

        $hasil .= '
            <tr>
                <td class="center">Total</td>
                <td class="center">Rp '.number_format($saldo + $saldoAwal,0,".",".") .'</td>
            </tr>';
    


        $hasil .= "</tbody>";
        $hasil .= "</table>";
        $hasil .= "</div>";
        $hasil .= "</section>";
        return $hasil;
  }


  function get_idSettingKas() 
  {
    $maxid = 0;
    $row = $this->db->query("SELECT ID_ACT AS maxid FROM SettingAkun where TipeSetting='Kas'")->row();
    if ($row) {
        $maxid = $row->maxid; 
    }
    return $maxid;
  }

}

