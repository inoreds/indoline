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
  
  public function pdf_BBM($id_journals)
  {    
       $this->load->helper("terbilang");
       $hasil = "";
       $nama_bank="";         
       $total = 0;                   
          
          $hasil .= '
              <style>
              table {
                  font-family: arial, sans-serif;
                  border-collapse: collapse;
                  width: 100%;
              }

              td, th {
                  border: 1px solid #000000;
                  text-align: left;
                  padding: 8px;
                  font-size:12px;
              }

              tr:nth-child(even) {
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
              </style>';

 


         $data_masuk = $this->db->query("select concat(sa.ID_SUB3_ACCOUNT) as ID_SUB_ACCOUNT, ID_JOURNALS,
                        DATE_FORMAT(DATE_TRANSACTION  , '%m-%d-%Y') as INDONESIAN_DATE, NAME_SUB_ACCOUNT, DEBIT
                        from journals j, sub_account sa
                        where j.ID_ACT = sa.ID_ACT 
                        AND CREDIT=0
                        AND id_journals ='$id_journals' ;
                        ");     

          $data_keluar = $this->db->query("select concat(sa.ID_SUB3_ACCOUNT) as ID_SUB_ACCOUNT, CREDIT, NOTE_3, NAME_SUB_ACCOUNT
                        from journals j, sub_account sa
                        where j.ID_ACT = sa.ID_ACT 
                        AND id_journals ='$id_journals'
                        AND DEBIT=0;
                        ");     

                                            
            foreach($data_masuk->result() as $g)
            {
               $nama_bank=$g->NAME_SUB_ACCOUNT;
               $date = $g->INDONESIAN_DATE;
            }

           
            $hasil .= '<table>
                    <tr>   
                      <td rowspan="3"></td>
                      <td rowspan="3"  style="font-size: 18px; text-align: center;">BUKTI BANK MASUK</td>
                      <td>No. : '. $g->ID_JOURNALS .'</td>
                    </tr>
                     <tr>   
                      <td>Tgl. : '. $date .'</td>
                    </tr>
                    <tr>   
                      <td>Lamp. :</td>
                    </tr>
                    <tr>
                          <td colspan=3>Bank : '.$nama_bank.'</td>
                    </tr>
                    <thead>
                        <tr>
                            <th>Perkiraan</th>
                            <th>Uraian</th>
                            <th>Jumlah </th>
                        </tr>
                    </thead>
                    <tbody>';
            
            foreach($data_keluar->result() as $g)
            {
                $hasil .= '
                    <tr>
                        <td  class="center" style="vertical-align:top;">'.$g->ID_SUB_ACCOUNT.'</td>
                        <td  class="center" style="vertical-align:top;">'.$g->NOTE_3.'</td>
                        <td  class="center" style="vertical-align:top;">Rp '.number_format($g->CREDIT,0,".",".") .'</td>
                    </tr>';
                
                $total = $total + $g->CREDIT;                    
                
            }


            $hasil .= "</tbody>";
            $hasil .= "</table>";
            $hasil .='<table>
                      <tbody>';

            $hasil .= '
                      <tr>
                        <td colspan=6>Terbilang : '. ucwords(number_to_words($total)) .'</td>
                      </tr>   
                      <tr>
                        <td  class="center" style="vertical-align:top;">Pembukuan</td>
                        <td  class="center" style="vertical-align:top;">Budget Control</td>
                        <td  class="center" style="vertical-align:top;">Mengetahui</td>
                        <td  class="center" style="vertical-align:top;">Menyetujui</td>
                        <td  class="center" style="vertical-align:top;">Kasir</td>
                        <td  class="center" style="vertical-align:top;">Penerima</td>
                      </tr>
                       <tr>
                        <td  class="center" style="vertical-align:top;" height="70px"></td>
                        <td  class="center" style="vertical-align:top;" height="70px"></td>
                        <td  class="center" style="vertical-align:top;" height="70px"></td>
                        <td  class="center" style="vertical-align:top;" height="70px"></td>
                        <td  class="center" style="vertical-align:top;" height="70px"></td>
                        <td  class="center" style="vertical-align:top;" height="70px"></td>
                      </tr>';
            

              
            $hasil    .='</tbody>
                          </table><br><br>';
     
       
      $hasil .= "</div>";
      $hasil .= "</section>";
      return $hasil;
  } 

  public function pdf_BBK($id_journals)
    {    
       $this->load->helper("terbilang");
       $hasil = "";
       $nama_bank="";         
       $total = 0;                   
          
          $hasil .= '
              <style>
              table {
                  font-family: arial, sans-serif;
                  border-collapse: collapse;
                  width: 100%;
              }

              td, th {
                  border: 1px solid #000000;
                  text-align: left;
                  padding: 8px;
                  font-size:12px;
              }

              tr:nth-child(even) {
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
              </style>';

 

           $data_keluar = $this->db->query("select concat(sa.ID_SUB3_ACCOUNT) as ID_SUB_ACCOUNT, ID_JOURNALS,
                        DATE_FORMAT(DATE_TRANSACTION  , '%m-%d-%Y') as INDONESIAN_DATE, NAME_SUB_ACCOUNT, DEBIT
                        from journals j, sub_account sa
                        where j.ID_ACT = sa.ID_ACT 
                        AND DEBIT=0
                        AND id_journals ='$id_journals' ;
                        ");     

          $data_masuk = $this->db->query("select concat(sa.ID_SUB3_ACCOUNT) as ID_SUB_ACCOUNT, DEBIT, NOTE_3, NAME_SUB_ACCOUNT
                        from journals j, sub_account sa
                        where j.ID_ACT = sa.ID_ACT 
                        AND id_journals ='$id_journals'
                        AND CREDIT=0;
                        ");     

                                            
            foreach($data_keluar->result() as $g)
            {
               $nama_bank=$g->NAME_SUB_ACCOUNT;
               $date = $g->INDONESIAN_DATE;
            }    
     
            $hasil .= '<table>
                    <tr>   
                      <td rowspan="3"></td>
                      <td rowspan="3"  style="font-size: 18px; text-align: center;">BUKTI BANK KELUAR</td>
                      <td>No. : '. $g->ID_JOURNALS  .'</td>
                    </tr>
                     <tr>   
                      <td>Tgl. : '. $date .'</td>
                    </tr>
                    <tr>   
                      <td>Lamp. :</td>
                    </tr>
                    <tr>
                          <td colspan=3>Bank : '.$nama_bank.'</td>
                    </tr>
                    <thead>
                        <tr>
                            <th>Perkiraan</th>
                            <th>Uraian</th>
                            <th>Jumlah </th>
                        </tr>
                    </thead>
                    <tbody>';
            
            foreach($data_masuk->result() as $g)
            {
                $hasil .= '
                    <tr>
                        <td  class="center" style="vertical-align:top;">'.$g->ID_SUB_ACCOUNT.'</td>
                        <td  class="center" style="vertical-align:top;">'.$g->NOTE_3 .'</td>
                        <td  class="center" style="vertical-align:top;">Rp '.number_format($g->DEBIT,0,".",".") .'</td>
                    </tr>';
                
                $total = $total + $g->DEBIT;                    
                
            }


            $hasil .= "</tbody>";
            $hasil .= "</table>";
            $hasil .='<table>
                      <tbody>';

            $hasil .= '
                      <tr>
                        <td colspan=6>Terbilang : '. ucwords(number_to_words($total)) .'</td>
                      </tr>   
                      <tr>
                        <td  class="center" style="vertical-align:top;">Pembukuan</td>
                        <td  class="center" style="vertical-align:top;">Budget Control</td>
                        <td  class="center" style="vertical-align:top;">Mengetahui</td>
                        <td  class="center" style="vertical-align:top;">Menyetujui</td>
                        <td  class="center" style="vertical-align:top;">Kasir</td>
                        <td  class="center" style="vertical-align:top;">Penerima</td>
                      </tr>
                       <tr>
                        <td  class="center" style="vertical-align:top;" height="70px"></td>
                        <td  class="center" style="vertical-align:top;" height="70px"></td>
                        <td  class="center" style="vertical-align:top;" height="70px"></td>
                        <td  class="center" style="vertical-align:top;" height="70px"></td>
                        <td  class="center" style="vertical-align:top;" height="70px"></td>
                        <td  class="center" style="vertical-align:top;" height="70px"></td>
                      </tr>';
            

              
            $hasil    .='</tbody>
                          </table><br><br>';
      

       
      $hasil .= "</div>";
      $hasil .= "</section>";
      return $hasil;
    }   

  public function pdf_BKM($id_journals)
  {    
       $this->load->helper("terbilang");
       $hasil = "";
       $nama_kas="";         
       $total = 0;                   
          
          $hasil .= '
              <style>
              table {
                  font-family: arial, sans-serif;
                  border-collapse: collapse;
                  width: 100%;
              }

              td, th {
                  border: 1px solid #000000;
                  text-align: left;
                  padding: 8px;
                  font-size:12px;
              }

              tr:nth-child(even) {
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
              </style>';

 


         $data_masuk = $this->db->query("select concat(sa.ID_SUB3_ACCOUNT) as ID_SUB_ACCOUNT, ID_JOURNALS,
                        DATE_FORMAT(DATE_TRANSACTION  , '%m-%d-%Y') as INDONESIAN_DATE, NAME_SUB_ACCOUNT, DEBIT
                        from journals j, sub_account sa
                        where j.ID_ACT = sa.ID_ACT 
                        AND CREDIT=0
                        AND id_journals ='$id_journals' ;
                        ");     

          $data_keluar = $this->db->query("select concat(sa.ID_SUB3_ACCOUNT) as ID_SUB_ACCOUNT, CREDIT, NOTE_3, NAME_SUB_ACCOUNT
                        from journals j, sub_account sa
                        where j.ID_ACT = sa.ID_ACT 
                        AND id_journals ='$id_journals'
                        AND DEBIT=0;
                        ");     

                                            
            foreach($data_masuk->result() as $g)
            {
               $nama_kas=$g->NAME_SUB_ACCOUNT;
               $date = $g->INDONESIAN_DATE;
            }

           
            $hasil .= '<table>
                    <tr>   
                      <td rowspan="3"></td>
                      <td rowspan="3"  style="font-size: 18px; text-align: center;">BUKTI KAS MASUK</td>
                      <td>No. : '. $g->ID_JOURNALS .'</td>
                    </tr>
                     <tr>   
                      <td>Tgl. : '. $date .'</td>
                    </tr>
                    <tr>   
                      <td>Lamp. :</td>
                    </tr>
                    <tr>
                          <td colspan=3>Kas : '.$nama_kas.'</td>
                    </tr>
                    <thead>
                        <tr>
                            <th>Perkiraan</th>
                            <th>Uraian</th>
                            <th>Jumlah </th>
                        </tr>
                    </thead>
                    <tbody>';
            
            foreach($data_keluar->result() as $g)
            {
                $hasil .= '
                    <tr>
                        <td  class="center" style="vertical-align:top;">'.$g->ID_SUB_ACCOUNT.'</td>
                        <td  class="center" style="vertical-align:top;">'.$g->NAME_SUB_ACCOUNT.'</td>
                        <td  class="center" style="vertical-align:top;">Rp '.number_format($g->CREDIT,0,".",".") .'</td>
                    </tr>';
                
                $total = $total + $g->CREDIT;                    
                
            }


            $hasil .= "</tbody>";
            $hasil .= "</table>";
            $hasil .='<table>
                      <tbody>';

            $hasil .= '
                      <tr>
                        <td colspan=6>Terbilang : '. ucwords(number_to_words($total)) .'</td>
                      </tr>   
                      <tr>
                        <td  class="center" style="vertical-align:top;">Pembukuan</td>
                        <td  class="center" style="vertical-align:top;">Budget Control</td>
                        <td  class="center" style="vertical-align:top;">Mengetahui</td>
                        <td  class="center" style="vertical-align:top;">Menyetujui</td>
                        <td  class="center" style="vertical-align:top;">Kasir</td>
                        <td  class="center" style="vertical-align:top;">Penerima</td>
                      </tr>
                       <tr>
                        <td  class="center" style="vertical-align:top;" height="70px"></td>
                        <td  class="center" style="vertical-align:top;" height="70px"></td>
                        <td  class="center" style="vertical-align:top;" height="70px"></td>
                        <td  class="center" style="vertical-align:top;" height="70px"></td>
                        <td  class="center" style="vertical-align:top;" height="70px"></td>
                        <td  class="center" style="vertical-align:top;" height="70px"></td>
                      </tr>';
            

              
            $hasil    .='</tbody>
                          </table><br><br>';
      
      $hasil .= "</div>";
      $hasil .= "</section>";
      return $hasil;
  } 

  public function pdf_BKK($id_journals)
  {    
       $this->load->helper("terbilang");
       $hasil = "";
       $nama_kas="";         
       $total = 0;                   
          
          $hasil .= '
              <style>
              table {
                  font-family: arial, sans-serif;
                  border-collapse: collapse;
                  width: 100%;
              }

              td, th {
                  border: 1px solid #000000;
                  text-align: left;
                  padding: 8px;
                  font-size:12px;
              }

              tr:nth-child(even) {
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
              </style>';

 

           $data_keluar = $this->db->query("select concat(sa.ID_SUB3_ACCOUNT) as ID_SUB_ACCOUNT, ID_JOURNALS,
                        DATE_FORMAT(DATE_TRANSACTION  , '%m-%d-%Y') as INDONESIAN_DATE, NAME_SUB_ACCOUNT, DEBIT
                        from journals j, sub_account sa
                        where j.ID_ACT = sa.ID_ACT 
                        AND DEBIT=0
                        AND id_journals ='$id_journals' ;
                        ");     

          $data_masuk = $this->db->query("select concat(sa.ID_SUB3_ACCOUNT) as ID_SUB_ACCOUNT, DEBIT, NOTE_3, NAME_SUB_ACCOUNT
                        from journals j, sub_account sa
                        where j.ID_ACT = sa.ID_ACT 
                        AND id_journals ='$id_journals'
                        AND CREDIT=0;
                        ");     

                                            
            foreach($data_keluar->result() as $g)
            {
               $nama_kas=$g->NAME_SUB_ACCOUNT;
               $date = $g->INDONESIAN_DATE;
            }    
     
            $hasil .= '<table>
                    <tr>   
                      <td rowspan="3"></td>
                      <td rowspan="3"  style="font-size: 18px; text-align: center;">BUKTI KAS KELUAR</td>
                      <td>No. : '. $g->ID_JOURNALS  .'</td>
                    </tr>
                     <tr>   
                      <td>Tgl. : '. $date .'</td>
                    </tr>
                    <tr>   
                      <td>Lamp. :</td>
                    </tr>
                    <tr>
                          <td colspan=3>Kas : '.$nama_kas.'</td>
                    </tr>
                    <thead>
                        <tr>
                            <th>Perkiraan</th>
                            <th>Uraian</th>
                            <th>Jumlah </th>
                        </tr>
                    </thead>
                    <tbody>';
            
            foreach($data_masuk->result() as $g)
            {
                $hasil .= '
                    <tr>
                        <td  class="center" style="vertical-align:top;">'.$g->ID_SUB_ACCOUNT.'</td>
                        <td  class="center" style="vertical-align:top;">'.$g->NAME_SUB_ACCOUNT .'</td>
                        <td  class="center" style="vertical-align:top;">Rp '.number_format($g->DEBIT,0,".",".") .'</td>
                    </tr>';
                
                $total = $total + $g->DEBIT;                    
                
            }


            $hasil .= "</tbody>";
            $hasil .= "</table>";
            $hasil .='<table>
                      <tbody>';

            $hasil .= '
                      <tr>
                        <td colspan=6>Terbilang : '. ucwords(number_to_words($total)) .'</td>
                      </tr>   
                      <tr>
                        <td  class="center" style="vertical-align:top;">Pembukuan</td>
                        <td  class="center" style="vertical-align:top;">Budget Control</td>
                        <td  class="center" style="vertical-align:top;">Mengetahui</td>
                        <td  class="center" style="vertical-align:top;">Menyetujui</td>
                        <td  class="center" style="vertical-align:top;">Kasir</td>
                        <td  class="center" style="vertical-align:top;">Penerima</td>
                      </tr>
                       <tr>
                        <td  class="center" style="vertical-align:top;" height="70px"></td>
                        <td  class="center" style="vertical-align:top;" height="70px"></td>
                        <td  class="center" style="vertical-align:top;" height="70px"></td>
                        <td  class="center" style="vertical-align:top;" height="70px"></td>
                        <td  class="center" style="vertical-align:top;" height="70px"></td>
                        <td  class="center" style="vertical-align:top;" height="70px"></td>
                      </tr>';
            

              
            $hasil    .='</tbody>
                          </table><br><br>';
      

       
      $hasil .= "</div>";
      $hasil .= "</section>";
      return $hasil;
    }   



}

