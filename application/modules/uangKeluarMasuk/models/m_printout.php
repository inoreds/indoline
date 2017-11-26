s<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_printout extends CI_Model {

    
    public function pdf_JKM($id)
    {    
       $this->load->helper("terbilang");
       $hasil = "";
       $nama_perusahaan="";
       $jenis_proyek="";
       $deskripsi="";
       $jk="";
       $bank="";
       $total = 0;
       $date = "";
       $keterangan = "";
       $get = $this->db->query("select * from kas k, journals j, sub_account sa where k.id_journals=j.id_journals and sa.id_act=j.id_act and sa.id_act<>28 and IdKas=$id");     
          
          foreach($get->result() as $g)
          {
             $jk=$g->TipeKas;
             $bank=$g->NAME_SUB_ACCOUNT;
             $date = $g->TglTransaksi;
          }
          
          if ($jk == 'Kas Masuk') {
            $keterangan = "Diterima dari";
          } else {
            $keterangan = "Disetor kepada";
          }           
          
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

          $date =  date_create($date); 

          $hasil .= '<table>
                    <tr>   
                      <td rowspan="3"></td>
                      <td rowspan="3"  style="font-size: 18px; text-align: center;">BUKTI '.$jk.'</td>
                      <td>No. : </td>
                    </tr>
                     <tr>   
                      <td>Tgl. : '. date_format($date, 'd-m-Y') .'</td>
                    </tr>
                    <tr>   
                      <td>Lamp. :</td>
                    </tr>
                    <tr>
                          <td colspan=3> '. $keterangan .' : '.$bank.'</td>
                    </tr>
                    <thead>
                        <tr>
                            <th>Perkiraan</th>
                            <th>Uraian</th>
                            <th>Jumlah </th>
                        </tr>
                    </thead>
                    <tbody>';                    


           $jumlah = 0;           
          foreach($get->result() as $g)
          {
              $hasil .= '
                  <tr>
                      <td  class="center" style="vertical-align:top;">'.$g->ID_SUB_ACCOUNT.$g->ID_SUB2_ACCOUNT.$g->ID_SUB3_ACCOUNT.'</td>
                      <td  class="center" style="vertical-align:top;">'.$g->Uraian.'</td>
                      <td  class="center" style="vertical-align:top;">Rp '.number_format($g->Jumlah,0,".",".") .'</td>
                  </tr>';
              
                $jumlah = $jumlah + $g->Jumlah;
          }

        

          $hasil .= "</tbody>";
          $hasil .= "</table>";
          $hasil .='<table>
                      <tbody>';
          
          $hasil .= '
                      <tr>
                        <td colspan=6>Terbilang : '. ucwords(number_to_words($jumlah)) .'</td>
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
                        </table>';
          $hasil .= "</div>";
          $hasil .= "</section>";
          return $hasil;
    }  
}

 