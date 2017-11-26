<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class m_laporan extends CI_Model {

  public function pdf_pembelianPertamina()
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
            <h1><center>LAPORAN PEMBELIAN<center></h1>
            <table>
              <thead>
                  <tr>
                      <th>Tgl PO G</th>
                      <th>Tanggal JT</th>
                      <th>No. PO</th>
                      <th>Penjual</th>
                      <th>Jenis Produk</th> 
                      <th>Kwantitas (Liter)</th>  
                      <th>Harga Pembelian</th>
                      <th>Pembayaran</th>
                      <th>Sisa Hutang</th>
                                           
                  </tr>
              </thead>
              <tbody>';

        $get = $this->db->query("Select * From PembelianPertamina pp 
                    inner join BarangBBM bb on pp.IdBBM = bb.IdBBM  
                    inner join MstKapal k on pp.IdVessel = k.IdVessel 
                    left outer join invoicepertamina i on pp.popembelian = i.popembelian");      
        

        foreach($get->result() as $g)
        {
            $hasil .= '
                <tr>
                    <td class="center">'.$g->TglPengajuan.'</td>
                    <td class="center">'.$g->TglPembayaran.'</td>
                    <td class="center">'.$g->POPembelian.'</td>
                    <td class="center">'.'PATRA NIAGA'.'</td>
                    <td class="center">'.$g->NamaBBM.'</td>
                    <td class="center">' .number_format($g->JumlahPermintaan,0,".",".").'</td>
                    <td class="center">'.$g->HargaBeli.'</td>
                    <td class="center">Rp. ' .number_format($g->TotalHarga,0,".",".").'</td>
                    
                </tr>';
            
        }

        $hasil .= "</tbody>";
        $hasil .= "</table>";
        $hasil .= "</div>";
        $hasil .= "</section>";
        return $hasil;
  }

  public function pdf_pembelianNonPertamina()
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
            <h1><center>LAPORAN PEMBELIAN<center></h1>
            <table>
              <thead>
                  <tr>
                      <th>T PO</th>
                      <th>Tanggal JT</th>
                      <th>No. PO</th>
                      <th>Penjual</th>
                      <th>Jenis Produk</th> 
                      <th>Kwantitas (Liter)</th>  
                      <th>Harga Pembelian</th>
                      <th>Pembayaran</th>
                      <th>Sisa Hutang</th>
                                           
                  </tr>
              </thead>
              <tbody>';

        $get = $this->db->query("Select * From PembelianNonPertamina pp 
                    inner join BarangBBM bb on pp.IdBBM = bb.IdBBM  
                    inner join MstKapal k on pp.IdVessel = k.IdVessel
                    inner join MstSupplier s on pp.IdSupplier = s.IdSupplier");      
        

        foreach($get->result() as $g)
        {
            $hasil .= '
                <tr>
                    <td class="center">'.$g->TglPengajuan.'</td>
                    <td class="center">'.$g->TglPembayaran.'</td>
                    <td class="center">'.$g->POPembelian_non.'</td>
                    <td class="center">'.$g->NamaSupplier.'</td>
                    <td class="center">'.$g->NamaBBM.'</td>
                    <td class="center">' .number_format($g->JumlahPermintaan,0,".",".").'</td>
                    <td class="center">'.$g->HargaBeli.'</td>
                    <td class="center">Rp. ' .number_format($g->Total,0,".",".").'</td>
                    
                </tr>';
            
        }

        $hasil .= "</tbody>";
        $hasil .= "</table>";
        $hasil .= "</div>";
        $hasil .= "</section>";
        return $hasil;
  }

  public function pdf_pembelianBarang()
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
            <h1><center>LAPORAN PEMBELIAN BARANG<center></h1>
            <table>
              <thead>
                  <tr>
                      <th>Tanggal</th>
                      <th>Nama Barang</th>
                      <th>Jumlah</th>
                      <th>Satuan</th>
                      <th>Harga Satuan</th>
                      <th>Total</th> 
                  </tr>
              </thead>
              <tbody>';

        $get = $this->db->query("Select * from PembelianBarangKapal p, PembelianBarangKapal_detil d, MstSatuan s where p.POPembelian_barangKapal = d.POPembelian_barangKapal and d.IdSatuan=s.IdSatuan");      
        

        foreach($get->result() as $g)
        {
            $hasil .= '
                <tr>
                    <td class="center">'.$g->TglPembelian.'</td>
                    <td class="center">'.$g->NamaBarang.'</td>
                    <td class="center">'.$g->Jumlah.'</td>
                    <td class="center">'.$g->NamaSatuan.'</td>
                    <td class="center">Rp.' .number_format($g->HargaSatuan,0,".",".").'</td>
                    <td class="center">Rp. ' .number_format($g->HargaTotal,0,".",".").'</td>
                    
                </tr>';
            
        }

        $hasil .= "</tbody>";
        $hasil .= "</table>";
        $hasil .= "</div>";
        $hasil .= "</section>";
        return $hasil;
  }
 
  public function pdf_penjualanBBM()
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
            <h1><center>LAPORAN PEMBELIAN<center></h1>
            <table>
              <thead>
                  <tr>
                      <th>Tanggal PO</th>
                      <th>No PO</th>
                      <th>Customer</th>
                      <th>Jenis Produk</th>
                      <th>Satuan</th> 
                      <th>Kwantitas (Liter)</th>  
                      <th>Harga</th>
                      <th>Total Haarga</th>
                                           
                  </tr>
              </thead>
              <tbody>';

        $get = $this->db->query("Select *
                    From PenjualanBBM pb, MstCustomer c, PenjualanBBM_detil p inner join BarangBBM b on p.IdBBM = b.IdBBM 
                    left outer join PenjualanBBM_MBA mba on p.NoPoCustomer = mba.NoPoCustomer and p.DetilNumber=mba.DetilNumber
                        left outer join PenjualanBBM_MBT mbt on p.NoPoCustomer = mbt.NoPoCustomer  and p.DetilNumber=mbt.DetilNumber
                        and p.DetilNumber = mba.DetilNumber 
                    where pb.NoPoCustomer = p.NoPoCustomer and pb.IdCustomer = c.IdCustomer");      
        

        foreach($get->result() as $g)
        {
            $hasil .= '
                <tr>
                    <td class="center">'.$g->TglPO.'</td>
                    <td class="center">'.$g->NoPoCustomer.'</td>
                    <td class="center">'.$g->NamaCustomer.'</td>
                    <td class="center">'.$g->NamaBBM.'</td>
                    <td class="center">'.'Liter'.'</td>
                    <td class="center">' .number_format($g->Quantity,0,".",".").'</td>
                    <td class="center">Rp.' .number_format($g->Harga,0,".",".").'</td>
                    <td class="center">Rp. ' .number_format($g->SubTotal,0,".",".").'</td>
                    
                </tr>';
            
        }

        $hasil .= "</tbody>";
        $hasil .= "</table>";
        $hasil .= "</div>";
        $hasil .= "</section>";
        return $hasil;
  }

  public function pdf_penjualanBBM_Cust($id)
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
            <h1><center>LAPORAN PEMBELIAN<center></h1>
            <table>
              <thead>
                  <tr>
                      <th>Tanggal PO</th>
                      <th>No PO</th>
                      <th>Customer</th>
                      <th>Jenis Produk</th>
                      <th>Satuan</th> 
                      <th>Kwantitas (Liter)</th>  
                      <th>Harga</th>
                      <th>Total Haarga</th>
                                           
                  </tr>
              </thead>
              <tbody>';

        $get = $this->db->query("Select *
                    From PenjualanBBM pb, MstCustomer c, PenjualanBBM_detil p inner join BarangBBM b on p.IdBBM = b.IdBBM 
                    left outer join PenjualanBBM_MBA mba on p.NoPoCustomer = mba.NoPoCustomer and p.DetilNumber=mba.DetilNumber
                        left outer join PenjualanBBM_MBT mbt on p.NoPoCustomer = mbt.NoPoCustomer  and p.DetilNumber=mbt.DetilNumber
                        and p.DetilNumber = mba.DetilNumber 
                    where pb.NoPoCustomer = p.NoPoCustomer and pb.IdCustomer = c.IdCustomer and c.IdCustomer='$id'");      
        

        foreach($get->result() as $g)
        {
            $hasil .= '
                <tr>
                    <td class="center">'.$g->TglPO.'</td>
                    <td class="center">'.$g->NoPoCustomer.'</td>
                    <td class="center">'.$g->NamaCustomer.'</td>
                    <td class="center">'.$g->NamaBBM.'</td>
                    <td class="center">'.'Liter'.'</td>
                    <td class="center">' .number_format($g->Quantity,0,".",".").'</td>
                    <td class="center">Rp.' .number_format($g->Harga,0,".",".").'</td>
                    <td class="center">Rp. ' .number_format($g->SubTotal,0,".",".").'</td>
                    
                </tr>';
            
        }

        $hasil .= "</tbody>";
        $hasil .= "</table>";
        $hasil .= "</div>";
        $hasil .= "</section>";
        return $hasil;
  }
  
  public function pdf_penjualanBBM_barang($id)
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
            <h1><center>LAPORAN PEMBELIAN<center></h1>
            <table>
              <thead>
                  <tr>
                      <th>Tanggal PO</th>
                      <th>No PO</th>
                      <th>Customer</th>
                      <th>Jenis Produk</th>
                      <th>Satuan</th> 
                      <th>Kwantitas (Liter)</th>  
                      <th>Harga</th>
                      <th>Total Haarga</th>
                                           
                  </tr>
              </thead>
              <tbody>';

        $get = $this->db->query("Select *
                    From PenjualanBBM pb, MstCustomer c, PenjualanBBM_detil p inner join BarangBBM b on p.IdBBM = b.IdBBM 
                    left outer join PenjualanBBM_MBA mba on p.NoPoCustomer = mba.NoPoCustomer and p.DetilNumber=mba.DetilNumber
                        left outer join PenjualanBBM_MBT mbt on p.NoPoCustomer = mbt.NoPoCustomer  and p.DetilNumber=mbt.DetilNumber
                        and p.DetilNumber = mba.DetilNumber 
                    where pb.NoPoCustomer = p.NoPoCustomer and pb.IdCustomer = c.IdCustomer and b.IdBBM='$id'");      
        

        foreach($get->result() as $g)
        {
            $hasil .= '
                <tr>
                    <td class="center">'.$g->TglPO.'</td>
                    <td class="center">'.$g->NoPoCustomer.'</td>
                    <td class="center">'.$g->NamaCustomer.'</td>
                    <td class="center">'.$g->NamaBBM.'</td>
                    <td class="center">'.'Liter'.'</td>
                    <td class="center">' .number_format($g->Quantity,0,".",".").'</td>
                    <td class="center">Rp.' .number_format($g->Harga,0,".",".").'</td>
                    <td class="center">Rp. ' .number_format($g->SubTotal,0,".",".").'</td>
                    
                </tr>';
            
        }

        $hasil .= "</tbody>";
        $hasil .= "</table>";
        $hasil .= "</div>";
        $hasil .= "</section>";
        return $hasil;
  }  

  public function pdf_penjualanBBM_periode($tglAwal, $tglAkhir)
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
            <h1><center>LAPORAN PEMBELIAN<center></h1>
            <table>
              <thead>
                  <tr>
                      <th>Tanggal PO</th>
                      <th>No PO</th>
                      <th>Customer</th>
                      <th>Jenis Produk</th>
                      <th>Satuan</th> 
                      <th>Kwantitas (Liter)</th>  
                      <th>Harga</th>
                      <th>Total Haarga</th>
                                           
                  </tr>
              </thead>
              <tbody>';

        $get = $this->db->query("Select *
                    From PenjualanBBM pb, MstCustomer c, PenjualanBBM_detil p inner join BarangBBM b on p.IdBBM = b.IdBBM 
                    left outer join PenjualanBBM_MBA mba on p.NoPoCustomer = mba.NoPoCustomer and p.DetilNumber=mba.DetilNumber
                        left outer join PenjualanBBM_MBT mbt on p.NoPoCustomer = mbt.NoPoCustomer  and p.DetilNumber=mbt.DetilNumber
                        and p.DetilNumber = mba.DetilNumber 
                    where pb.NoPoCustomer = p.NoPoCustomer and pb.IdCustomer = c.IdCustomer and TglPO>='$tglAwal' and TglPO <='$tglAkhir'");      
        

        foreach($get->result() as $g)
        {
            $hasil .= '
                <tr>
                    <td class="center">'.$g->TglPO.'</td>
                    <td class="center">'.$g->NoPoCustomer.'</td>
                    <td class="center">'.$g->NamaCustomer.'</td>
                    <td class="center">'.$g->NamaBBM.'</td>
                    <td class="center">'.'Liter'.'</td>
                    <td class="center">' .number_format($g->Quantity,0,".",".").'</td>
                    <td class="center">Rp.' .number_format($g->Harga,0,".",".").'</td>
                    <td class="center">Rp. ' .number_format($g->SubTotal,0,".",".").'</td>
                    
                </tr>';
            
        }

        $hasil .= "</tbody>";
        $hasil .= "</table>";
        $hasil .= "</div>";
        $hasil .= "</section>";
        return $hasil;
  }  
}

