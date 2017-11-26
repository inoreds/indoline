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
  
  public function pdf_BBM($tahun, $bulan, $customer)
  {    
       $this->load->helper("terbilang");
       $hasil = "";
       $terima_dari="";         
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

 

      $tanggal = $this->db->query("select distinct(DATE_TRANSACTION) as DATE_TRANSACTION
                                from journals j, sub_account sa, penjualanbbm pb, penjualanbbm_detil pd, mstcustomer c, barangbbm bb
                                where j.ID_ACT = sa.ID_ACT 
                                AND pb.NoPoCustomer = pd.NoPoCustomer
                                AND j.ID_TRANSACTION = concat(pb.NoPoCustomer,pd.DetilNumber)
                                AND pb.idcustomer = c.idcustomer
                                AND bb.idbbm = pd.idbbm
                                AND NOTE LIKE '%Pelunasan Piutang%' 
                                AND MONTH(DATE_TRANSACTION) = $bulan
                                AND YEAR(DATE_TRANSACTION) = $tahun
                                AND ID_TRANSACTION like '%POC%' 
                                AND CREDIT=0;");        

      foreach ($tanggal->result() as $tgl) {

          $get = $this->db->query("select concat(sa.ID_SUB_ACCOUNT, sa.ID_SUB2_ACCOUNT, sa.ID_SUB3_ACCOUNT) as ID_SUB_ACCOUNT,
                        pb.NoPoCustomer as NoPoCustomer, NoPO, Note, NamaBBM, DATE_TRANSACTION, DEBIT, NAME_SUB_ACCOUNT, NamaCustomer
                        from journals j, sub_account sa, penjualanbbm pb, penjualanbbm_detil pd, mstcustomer c, barangbbm bb
                        where j.ID_ACT = sa.ID_ACT 
                        AND pb.NoPoCustomer = pd.NoPoCustomer
                        AND j.ID_TRANSACTION = concat(pb.NoPoCustomer,pd.DetilNumber)
                        AND pb.idcustomer = c.idcustomer
                        AND bb.idbbm = pd.idbbm
                        AND DATE_TRANSACTION='".$tgl->DATE_TRANSACTION."'
                        AND pb.idcustomer='".$customer."'
                        AND NOTE LIKE '%Pelunasan Piutang%' 
                        AND ID_TRANSACTION like '%POC%' 
                        AND CREDIT=0;
                        ");     
                                            
            foreach($get->result() as $g)
            {
               $terima_dari=$g->NamaCustomer;
            }
            $date =  date_create($g->DATE_TRANSACTION); 
            $hasil .= '<table>
                    <tr>   
                      <td rowspan="3"></td>
                      <td rowspan="3"  style="font-size: 18px; text-align: center;">BUKTI BANK MASUK</td>
                      <td>No. : '. $g->NoPO .'</td>
                    </tr>
                     <tr>   
                      <td>Tgl. : '. date_format($date, 'd-m-Y') .'</td>
                    </tr>
                    <tr>   
                      <td>Lamp. :</td>
                    </tr>
                    <tr>
                          <td colspan=3>Diterima dari : '.$terima_dari.'</td>
                    </tr>
                    <thead>
                        <tr>
                            <th>Perkiraan</th>
                            <th>Uraian</th>
                            <th>Jumlah </th>
                        </tr>
                    </thead>
                    <tbody>';
            
            foreach($get->result() as $g)
            {
                $hasil .= '
                    <tr>
                        <td  class="center" style="vertical-align:top;">'.$g->ID_SUB_ACCOUNT.'</td>
                        <td  class="center" style="vertical-align:top;">'.$g->Note.' Penjualan '.$g->NamaBBM.'</td>
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
      }

       
      $hasil .= "</div>";
      $hasil .= "</section>";
      return $hasil;
  } 

  public function pdf_BBK($tahun, $bulan, $supplier)
    {    
       $this->load->helper("terbilang");
       $hasil = "";
       $bayar_kepada="";         
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

 

      $tanggal = $this->db->query("select distinct(DATE_TRANSACTION) as DATE_TRANSACTION
                                from journals j, sub_account sa, pembelianpertamina pb,  mstsupplier s, barangbbm bb
                                where j.ID_ACT = sa.ID_ACT 
                                AND pb.IdSupplier = s.IdSupplier
                                AND j.ID_TRANSACTION = pb.POPembelian
                                AND bb.idbbm = pb.idbbm
                                AND NOTE LIKE '%Pelunasan Hutang%' 
                                AND DEBIT=0
                                AND MONTH(DATE_TRANSACTION) = $bulan
                                AND YEAR(DATE_TRANSACTION) = $tahun");        

      foreach ($tanggal->result() as $tgl) {

          $get = $this->db->query("select concat(sa.ID_SUB_ACCOUNT, sa.ID_SUB2_ACCOUNT, sa.ID_SUB3_ACCOUNT) as ID_SUB_ACCOUNT,
                                 pb.POPembelian as POPembelian, NoPO, Note, NamaBBM, DATE_TRANSACTION, CREDIT, NAME_SUB_ACCOUNT, NamaSupplier
                                from journals j, sub_account sa, pembelianpertamina pb,  mstsupplier s, barangbbm bb
                                where j.ID_ACT = sa.ID_ACT 
                                AND pb.IdSupplier = s.IdSupplier
                                AND j.ID_TRANSACTION = pb.POPembelian
                                AND bb.idbbm = pb.idbbm
                                AND NOTE LIKE '%Pelunasan Hutang%' 
                                AND DEBIT=0
                                AND DATE_TRANSACTION='".$tgl->DATE_TRANSACTION."'
                                AND pb.IdSupplier='".$supplier."';");     
                                            
            foreach($get->result() as $g)
            {
               $bayar_kepada=$g->NamaSupplier;
            }
            $date =  date_create($g->DATE_TRANSACTION); 
            $hasil .= '<table>
                    <tr>   
                      <td rowspan="3"></td>
                      <td rowspan="3"  style="font-size: 18px; text-align: center;">BUKTI BANK KELUAR</td>
                      <td>No. : '. $g->NoPO .'</td>
                    </tr>
                     <tr>   
                      <td>Tgl. : '. date_format($date, 'd-m-Y') .'</td>
                    </tr>
                    <tr>   
                      <td>Lamp. :</td>
                    </tr>
                    <tr>
                          <td colspan=3>Dibarykan Kepada : '.$bayar_kepada.'</td>
                    </tr>
                    <thead>
                        <tr>
                            <th>Perkiraan</th>
                            <th>Uraian</th>
                            <th>Jumlah </th>
                        </tr>
                    </thead>
                    <tbody>';
            
            foreach($get->result() as $g)
            {
                $hasil .= '
                    <tr>
                        <td  class="center" style="vertical-align:top;">'.$g->ID_SUB_ACCOUNT.'</td>
                        <td  class="center" style="vertical-align:top;">'.$g->Note.' Penjualan '.$g->NamaBBM.'</td>
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
      }

       
      $hasil .= "</div>";
      $hasil .= "</section>";
      return $hasil;
    }   

}

