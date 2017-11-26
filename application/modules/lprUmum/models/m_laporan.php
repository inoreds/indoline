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
                font-size:10px;
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
                      <th rowspan="2">Tgl PO</th>
                      <th rowspan="2">Tgl JT</th>
                      <th rowspan="2">No. PO</th>
                      <th rowspan="2">Penjual</th> 
                      <th rowspan="2">Jenis</th>
                      <th rowspan="2">Kwantitas</th>
					  <th colspan="8" style="text-align:center;">Harga Pembelian</th>
                      <th rowspan="2">HPP</th>
                      <th rowspan="2">Pembayaran</th>
                      <th rowspan="2">Sisa Hutang</th>
                      <th rowspan="2">Keterangan</th>
                    </tr>
                    <tr>
						<th>Harga</th>
						<th>PBBKB</th>
            <th>Discount</th>
						<th>PPN 10%</th>
						<th>RABAT</th>
						<th>PPh22</th>
						<th>ROUNDING</th>
						<th>Total Hutang</th>
                    </tr>
					
				</thead>
              <tbody>';

        $get = $this->db->query("Select * From PembelianPertamina pp
                    left outer join mstPbbkb mp on pp.idPBBKB = mp.idPBBKB 
                    inner join BarangBBM bb on pp.IdBBM = bb.IdBBM  
                    inner join MstKapal k on pp.IdVessel = k.IdVessel
                    inner join MstSupplier s on pp.IdSupplier = s.IdSupplier 
                    left outer join invoicepertamina i on pp.popembelian = i.popembelian");      
        

        $count=0;
        foreach($get->result() as $g)
        {
            $count++;
            if($g->PPh22 >= 0) {
                      $tPPh22 = 0;
                    } else {
                      $tPPh22 = ($g->PPh22 * $g->HargaBeli - $g->Rabat) * 0.003;
                    }
            $hasil .= '
                <tr>
                    <td class="center">'.date("d/m/Y", strtotime($g->TglPengajuan )).'</td>
                    <td class="center">'.date("d/m/Y", strtotime($g->TglPembayaran)).'</td>
                    <td class="center">'.$g->NoPO.'</td>
                    <td class="center">'.$g->NamaSupplier.'</td>
                    <td class="center">'.$g->NamaBBM.'</td>
                    <td class="center">' .number_format($g->JumlahPermintaan,0,".",".").'</td>
                    <td class="center">Rp. '.number_format($g->HargaBeli,0,".",".").'</td>
                    <td class="center">Rp. '.number_format((($g->HargaBeli) *($g->JumlahPermintaan))* ($g->nilai),0,".",".").'</td>
                    <td class="center">RP.' .number_format($g->TotalHarga - ($g->TotalHarga*$g->Discount),0,".",".").'</td>
                    <td class="center">RP.' .number_format($g->TotalHarga * 10 / 100,0,".",".").'</td>
                    <td class="center">Rp. ' .$g->Rabat.'</td>
                    <td class="center">RP. ' .$g->PPh22.'</td>
                    <td class="center">' .$g->Pembulatan.'</td>
                    <td class="center">Rp. ' .number_format((($g->TotalHarga * 10 / 100)+($g->Rabat)+($g->PPh22)+($g->Pembulatan)),0,".",".").'</td>
                    <td class="center">Rp. ' .number_format((($g->JumlahPermintaan * $g->HargaBeli)+($tPPh22)+($g->Rabat)+($g->PPh22)+($g->Pembulatan)),0,".",".").'</td>                 
                    <td class="center">Rp. ' .number_format((($g->TotalHarga * 10 / 100)+($g->Rabat)+($g->PPh22)+($g->Pembulatan)),0,".",".").'</td>
                    <td class="center">Rp. ' .number_format(((($g->TotalHarga * 10 / 100)+($g->Rabat)+($g->PPh22)+($g->Pembulatan)) - (($g->TotalHarga * 10 / 100)+($g->Rabat)+($g->PPh22)+($g->Pembulatan))),0,".",".").'</td>
					<td class="center">-</td>
					
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
                font-size:9px;
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
            <h1><center>RINCIAN PO PEMBELIAN NON PERTAMINA<center></h1>
            <table>
              <thead>
                    <tr>
                      <th>NO</th>
                      <th>Nama Supplier</th>
                      <th width="5%">Tgl. PO</th>
                      <th>Jenis BBM</th> 
                      <th>Jenis Satuan</th>
                      <th>Quantity</th>  
                      <th>Harga</th>
                      <th>PPN 10%</th>
                      <th>PBBKB</th>
                      <th>RABAT</th>
                      <th>ROUNDING</th>
                      <th>Total Harga</th>
                      <th>Nama Kapal Yang di Supply</th>
                      <th>PPN/ Non PPN</th>
                      <th>Lokasi Supply</th>
                      <th>Keterangan</th>
                    </tr>      
              </thead>
              <tbody>';

        $get = $this->db->query("Select * From PembelianNonPertamina pp 
                    inner join BarangBBM bb on pp.IdBBM = bb.IdBBM  
                    inner join MstKapal k on pp.IdVessel = k.IdVessel
                    inner join MstSupplier s on pp.IdSupplier = s.IdSupplier");      
        

        $count=0;
        foreach($get->result() as $g)
        {
            $count++;
            //$Pembulatan = explode((($g->HargaBeli/1.15) + (($g->HargaBeli/1.15)*$g->JumlahPermintaan) + ((($g->HargaBeli/1.15)*$g->JumlahPermintaan)*0.1) + ((($g->HargaBeli/1.15)*$g->JumlahPermintaan)*0.05)), -3);
			$hrg		= $g->HargaBeli/1.15;
			$tothrg		= $hrg * $g->JumlahPermintaan;
			$ppn		= $tothrg*0.1;
			$pbbkb		= $tothrg * 0.05;
			$grTot		= $tothrg + $ppn + $pbbkb;
			// echo $grTot;
			$pembulatan = substr($grTot, -3);
			if ($pembulatan="000")
			{
				$bulat = "0";
			}
			else
			{
				$bulat = $pembulatan;
			}
			//print_r($pembulatan);
			$hasil .= '
                <tr>
                    <td class="center">'.$count.'</td>
                    <td class="center">'.$g->NamaSupplier.'</td>
                    <td class="center">'.$g->TglPengajuan.'</td>
                    <td class="center">'.$g->NamaBBM.'</td>
                    <td class="center">Liter</td>
                    <td class="center">' .number_format($g->JumlahPermintaan,0,".",".").'</td>
                    <td class="center">Rp. '.number_format(($g->HargaBeli/1.15),0,".",".").'</td>
                    <td class="center">Rp. '.number_format((($g->HargaBeli/1.15)*$g->JumlahPermintaan),0,".",".").'</td>
                    <td class="center">Rp. '.number_format(((($g->HargaBeli/1.15)*$g->JumlahPermintaan)*0.1),0,".",".").'</td>
                    <td class="center">Rp. '.number_format(((($g->HargaBeli/1.15)*$g->JumlahPermintaan)*0.05),0,".",".").'</td>
                    <td class="center">' .$bulat.'</td>
                    <td class="center">Rp. ' .number_format($g->Total,0,".",".").'</td>
                    <td class="center">'.$g->VesselName.'</td>
                    <td class="center">Non PPN</td>
                    <td class="center">'.$g->PortSource.'</td>
                    <td class="center">-</td>
                    
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
            <h1><center>LAPORAN PEMBELIAN BARANG KAPAL<center></h1>
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
                padding: 5px;
                font-size:9px;
            }
            /*
            tr:nth-child(even) {
                background-color: #dddddd;
            }
            */
            p {
              font-family: arial, sans-serif;
                font-size: 12px;
            }
            h1 {
              font-family: arial, sans-serif;
                font-size: 20px;
                text-align: center;
            }
            h2 {
              font-family: arial, sans-serif;
                font-size: 18px;
                text-align: center;
            }
            p.fourtabs {
                tab-size:4;
                -moz-tab-size: 4;
                -o-tab-size:  4;
              white-space: pre-wrap;
            }
            </style>
            <h2>PT. INDOLINE INCOMEKITA</h1>
            <h1>LAPORAN PENJUALAN</h1>
            <table>
              <thead>
                    <tr>
                      <th>NO</th>
                      <th>Tgl. PO</th>
                      <th>No.Kwitansi</th>
                      <th>No.Invoice</th>
                      <th>Nama Customer</th>
                      <th>No. PO</th>
                      <th>PPN / Non</th>
                      <th>MBA/OAT</th>
                      <th>Jenis BBM</th> 
                      <th>Jenis Satuan</th>
                      <th>Harga</th>
                      <th>Quantity</th>
                      <th>PPN</th>
                      <th>PBBKB</th>  
                      <th>Total Harga</th>
                      <th>Nama Kapal di Supply</th>
                      <th>Lokasi Supply</th>
                      <th>Keterangan</th>
                    </tr>      
              </thead>
              <tbody>';

        // $get = $this->db->query("Select pb.TglPO, pb.NoPoCustomer, pb.NoPO, pb.noInvoice, pb.Ppn, pb.MBAOAT, b.NamaBBM, p.Harga, p.Quantity, mp.nilai, p.SubTotal, k.VesselName, pb.LokasiPengiriman, c.NamaCustomer 
        //             From PenjualanBBM pb, MstCustomer c, mstPbbkb mp , MstKapal k, PenjualanBBM_MBA mba1, PenjualanBBM_detil p inner join BarangBBM b on p.IdBBM = b.IdBBM 
        //             left outer join PenjualanBBM_MBA mba on p.NoPoCustomer = mba.NoPoCustomer and p.DetilNumber=mba.DetilNumber
        //                 left outer join PenjualanBBM_MBT mbt on p.NoPoCustomer = mbt.NoPoCustomer  and p.DetilNumber=mbt.DetilNumber
        //                 and p.DetilNumber = mba.DetilNumber 
        //             where pb.NoPoCustomer = p.NoPoCustomer and pb.idPBBKB = mp.idPBBKB and mba1.IdVessel = k.IdVessel and pb.IdCustomer = c.IdCustomer order by pb.NoPoCustomer and pb.tglPo asc");      
        
        $get = $this->db->query("select pb.TglPO, pb.NoPoCustomer, pb.NoPO, pb.noInvoice, pb.Ppn, pb.MBAOAT, b.NamaBBM, pd.Harga, pd.Quantity, mp.nilai, pd.SubTotal, k.VesselName, pb.LokasiPengiriman, c.NamaCustomer 
                                    from PenjualanBBM pb, barangbbm b, mstpbbkb mp, mstcustomer c,  penjualanbbm_detil pd
                                    left outer join penjualanbbm_mba pmb on (pmb.NoPOCustomer = pd.NoPoCustomer and pmb.DetilNumber = pd.DetilNumber)
                                    left outer join penjualanbbm_mbt pmt on (pmt.NoPOCustomer = pd.NoPoCustomer and pmt.DetilNumber = pd.DetilNumber)
                                    left outer join mstkapal k on  pmb.IdVessel = k.IdVessel
                                    where pd.NoPOCustomer = pb.NoPOCustomer and b.IdBBM = pd.IdBBM and mp.idPBBKB = pb.idPBBKB and pb.idcustomer = c.idcustomer");


        $count=0;
        foreach($get->result() as $g)
        {
            $count++;
            $pbbkb = $g->nilai;
            if ($pbbkb==0.05) {
              $wil = 1.15;
            } else {
              $wil = 1.11288;
            }
            if ($g->NamaBBM == "MFO"){
                $harga = $g->Harga/1.1;
                $pbbkb = $pbbkb*0;
                //$pbbkb = $g->nilai*0;
            }else {
                $harga = $g->Harga/$wil;
                $pbbkb = $g->nilai;
            }
            $hasil .= '
                <tr>
                    <td class="center">'.$count.'</td>
                    <td class="center">'.$g->TglPO.'</td>               
                    <td class="center">'.intval(preg_replace('/[^0-9]+/', '', $g->NoPoCustomer), 10).'/I.I/'.$this->getMonthRomawi().'/'.(date('m')).'/'.date('Y').'</td>
                    <td class="center">'.$g->noInvoice.'</td>
                    <td class="center">'.$g->NamaCustomer.'</td>
                    <td class="center">'.$g->NoPO.'</td>
                    <td class="center">'.$g->Ppn.'</td>
                    <td class="center">'.$g->MBAOAT.'</td>
                    <td class="center">'.$g->NamaBBM.'</td>
                    <td class="center">'.'Liter'.'</td>
                    <td class="center">Rp.' .number_format(($harga),2,".",".").'</td>
                    <td class="center">' .number_format($g->Quantity,0,".",".").'</td>
                    <td class="center">'.number_format(((($harga)*($g->Quantity))*0.1),2,".",".").'</td>
                    <td class="center">'.number_format(((($harga)*($g->Quantity))*($g->nilai)),2,".",".").'</td>
                    <td class="center">Rp. ' .number_format($g->SubTotal,0,".",".").'</td>
                    <td class="center">' .$g->VesselName.'</td>
                    <td class="center">'.$g->LokasiPengiriman.'</td>
                    <td class="center">-</td>
                    

                    
                </tr>';
            
        }

        $hasil .= "</tbody>";
        $hasil .= "</table>";
        $hasil .= "</div>";
        $hasil .= "</section>";
        return $hasil;
  }

public function pdf_pembelianNonAgen()
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
                padding: 5px;
                font-size:9px;
            }
            /*
            tr:nth-child(even) {
                background-color: #dddddd;
            }
            */
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
            <h1><center>LAPORAN PEMBELIAN NON AGEN<center></h1>
            <table>
              <thead>
                    <tr>
                      <th>NO</th>
                      <th>NO. Resi</th>
                      <th>Tgl. Pembeyaran</th>
                      <th>Nama Kapal</th>
                      <th>Jenis BBM</th>
                      <th>Harga</th>
                      <th>jumlah Barang</th>
                      <th>Total</th>
                    </tr>      
              </thead>
              <tbody>';

        $get = $this->db->query("Select * From pembeliannonagen pn 
                    inner join BarangBBM bb on pn.IdBBM = bb.IdBBM    
                    inner join MstKapal k on pn.IdVessel = k.IdVessel");      
        

        $count=0;
        foreach($get->result() as $g)
        {
            $count++;
            $hasil .= '
                <tr>
                    <td class="center">'.$count.'</td>
                    <td class="center">'.$g->NoResi.'</td>
                    <td class="center">'.$g->TglPembayaran.'</td>
                    <td class="center">'.$g->VesselName.'</td>
                    <td class="center">'.$g->NamaBBM.'</td>               
                    <td class="center">Rp.' .number_format(($g->Harga),2,".",".").'</td>
                    <td class="center">' .number_format($g->qty,0,".",".").'</td>
                    <td class="center">Rp.' .number_format(($g->total),2,".",".").'</td>           
                </tr>';
            
        }

        $hasil .= "</tbody>";
        $hasil .= "</table>";
        $hasil .= "</div>";
        $hasil .= "</section>";
        return $hasil;
  }

  public function pdf_pemakaianBBM()
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
                padding: 5px;
                font-size:9px;
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
            <h1><center>LAPORAN PEMAKAIAN BBM KAPAL<center></h1>
            <table>
              <thead>
                    <tr>
                      <th rowspan="2">No</th>
                      <th rowspan="2">No. PO</th>
                      <th rowspan="2">Tgl Transaksi</th>
                      <th rowspan="2">Nama Kapal</th>
                      <th rowspan="2">Port</th> 
                      <th rowspan="2">Jenis BBM</th>
                      <th rowspan="2">Jumlah Barang (L)</th>
            <th colspan="2" style="text-align:center;">Temperatur</th>
                      
            <th colspan="4" style="text-align:center;">SpecificGravity</th>
                      
            <th colspan="2" style="text-align:center;">Flash Point</th>
                      
                      <th rowspan="2">Water</th>
                      <th rowspan="2">Aproximate</th>
                      <th rowspan="2">Lighter</th>
                      <th rowspan="2">Nama Pengawas</th>
                      <th rowspan="2">Chief Engginer</th>
                    </tr>      
                      <th>F</th>
                      <th>C</th>

                      <th>SpecificGravity</th>
                      <th>F</th>
                      <th>C</th>
                      <th>60c</th>r>
                      
                      <th>FlashPoint</th>
                      <th>C</th>
                    </tr>
              </thead>
              <tbody>';

        $get = $this->db->query("Select * From pemakaianbbm pbb 
                    inner join BarangBBM bb on pbb.IdBBM = bb.IdBBM    
                    inner join MstKapal k on pbb.IdVessel = k.IdVessel");      
        

        $count=0;
        foreach($get->result() as $g)
        {
            $count++;
            $hasil .= '
                <tr>
                    <td class="center">'.$count.'</td>
                    <td class="center">'.$g->NoPO.'</td>
                    <td class="center">'.$g->Date.'</td>
                    <td class="center">'.$g->VesselName.'</td>
                    <td class="center">'.$g->Port.'</td>
                    <td class="center">'.$g->NamaBBM.'</td>
                    <td class="center">'.number_format($g->LiterOBS,0,".",".").'</td>
                    <td class="center">'.$g->Temperatur_F.'</td>
                    <td class="center">'.$g->Temperatur_C.'</td>
                    <td class="center">'.$g->SpecificGravity.'</td>
                    <td class="center">'.$g->SpecificGravity_F.'</td>
                    <td class="center">'.$g->SpecificGravity_C.'</td>
                    <td class="center">'.$g->SpecificGravity60_C.'</td>
                    <td class="center">'.$g->FlashPoint.'</td>
                    <td class="center">'.$g->FlashPoint_C.'</td>
                    <td class="center">'.$g->Water.'</td>
                    <td class="center">'.$g->Aproximate.'</td>
                    <td class="center">'.$g->lighter.'</td>
                    <td class="center">'.$g->NamaPengawas.'</td>
                    <td class="center">'.$g->ChiefEnginer.'</td>       
                </tr>';
            
        }

        $hasil .= "</tbody>";
        $hasil .= "</table>";
        $hasil .= "</div>";
        $hasil .= "</section>";
        return $hasil;
  }

public function pdf_ReturPembelian()
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
                padding: 5px;
                font-size:9px;
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
            <h1><center>LAPORAN RETUR PEMBELIAN<center></h1>
            <table>
              <thead>
                    <tr>
                      <th>NO</th>
                      <th>NO. PO</th>
                      <th>Tgl. PO</th>
                      <th>Nama Suplier</th>
                      <th>Nama Kapal</th>
                      <th>Jenis BBM</th>
                      <th>jumlah Barang</th>
                      <th>Harga</th>
                      <th>Total</th>
                      <th>Keterangan</th>
                    </tr>      
              </thead>
              <tbody>';

        $get = $this->db->query("Select * From retur_pembelian rp 
                    inner join BarangBBM bb on rp.IdBBM = bb.IdBBM    
                    inner join MstKapal k on rp.IdVessel = k.IdVessel");      
        

        $count=0;
        foreach($get->result() as $g)
        {
            $count++;
            $hasil .= '
                <tr>
                    <td class="center">'.$count.'</td>
                    <td class="center">'.$g->noPo.'</td>
                    <td class="center">'.$g->TglTransaksi.'</td>
                    <td class="center">'.$g->nmSupplier.'</td>
                    <td class="center">'.$g->VesselName.'</td>
                    <td class="center">'.$g->NamaBBM.'</td>               
                    <td class="center">Rp.' .number_format(($g->hargaBeli),2,".",".").'</td>
                    <td class="center">' .number_format($g->qty,0,".",".").'</td>
                    <td class="center">Rp.' .number_format(($g->total),2,".",".").'</td>
                    <td class="center">'.$g->Keterangan.'</td>
                    <td class="center">-</td>           
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

            /*
            tr:nth-child(even) {
                background-color: #dddddd;
            }
            */
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
            <h1><center>LAPORAN PENJUALAN<center></h1>
            <table>
              <thead>
                    <tr>
                      <th>NO</th>
                      <th>Tgl. PO</th>
                      <th>No.Kwitansi</th>
                      <th>No.Invoice</th>
                      <th>Nama Customer</th>
                      <th>Jenis BBM</th> 
                      <th>Jenis Satuan</th>
                      <th>Quantity</th>  
                      <th>Harga</th>
                      <th>Total Harga</th>
                      <th>Nama Kapal di Supply</th>
                      <th>PPN / Non</th>
                      <th>Lokasi Supply</th>
                      <th>Keterangan</th>
                    </tr>      
              </thead>
        <tbody>';

        // $get = $this->db->query("Select pb.TglPO, pb.NoPoCustomer, pb.NoPO, pb.noInvoice, pb.Ppn, pb.MBAOAT, b.NamaBBM, p.Harga, p.Quantity, mp.nilai, p.SubTotal, k.VesselName, pb.LokasiPengiriman, c.NamaCustomer, c.IdCustomer 
        //             From PenjualanBBM pb, MstCustomer c, mstPbbkb mp , MstKapal k, PenjualanBBM_MBA mba1, PenjualanBBM_detil p inner join BarangBBM b on p.IdBBM = b.IdBBM 
        //             left outer join PenjualanBBM_MBA mba on p.NoPoCustomer = mba.NoPoCustomer and p.DetilNumber=mba.DetilNumber
        //                 left outer join PenjualanBBM_MBT mbt on p.NoPoCustomer = mbt.NoPoCustomer  and p.DetilNumber=mbt.DetilNumber
        //                 and p.DetilNumber = mba.DetilNumber 
        //             where pb.NoPoCustomer = p.NoPoCustomer and pb.idPBBKB = mp.idPBBKB and mba1.IdVessel = k.IdVessel and pb.IdCustomer = c.IdCustomer and c.IdCustomer='$id' and c.IdCustomer='$id'order by pb.NoPoCustomer and pb.tglPo asc");      
        

        $get = $this->db->query("select pb.TglPO, pb.NoPoCustomer, pb.NoPO, pb.noInvoice, pb.Ppn, pb.MBAOAT, b.NamaBBM, pd.Harga, pd.Quantity, mp.nilai, pd.SubTotal, k.VesselName, pb.LokasiPengiriman, c.NamaCustomer 
                                    from PenjualanBBM pb, barangbbm b, mstpbbkb mp, mstcustomer c,  penjualanbbm_detil pd
                                    left outer join penjualanbbm_mba pmb on (pmb.NoPOCustomer = pd.NoPoCustomer and pmb.DetilNumber = pd.DetilNumber)
                                    left outer join penjualanbbm_mbt pmt on (pmt.NoPOCustomer = pd.NoPoCustomer and pmt.DetilNumber = pd.DetilNumber)
                                    left outer join mstkapal k on  pmb.IdVessel = k.IdVessel
                                    where pd.NoPOCustomer = pb.NoPOCustomer and b.IdBBM = pd.IdBBM and mp.idPBBKB = pb.idPBBKB and pb.idcustomer = c.idcustomer
                                    and c.IdCustomer='$id'order by pb.NoPoCustomer and pb.tglPo asc");


        $count=0;
        foreach($get->result() as $g)
        {
            $count++;
            $hasil .= '
                <tr>
                    <td class="center">'.$count.'</td>
                    <td class="center">'.$g->TglPO.'</td>
                    <td class="center">'.intval(preg_replace('/[^0-9]+/', '', $g->NoPoCustomer), 10).'/I.I/'.$this->getMonthRomawi().'/'.(date('m')).'/'.date('Y').'</td>
                    <td class="center">'.$g->noInvoice.'</td>
                    <td class="center">'.$g->NamaCustomer.'</td>                    
                    <td class="center">'.$g->NamaBBM.'</td>
                    <td class="center">'.'Liter'.'</td>
                    <td class="center">' .number_format($g->Quantity,0,".",".").'</td>
                    <td class="center">Rp.' .number_format($g->Harga,0,".",".").'</td>
                    <td class="center">Rp. ' .number_format($g->SubTotal,0,".",".").'</td>
                    <td class="center">' .$g->VesselName.'</td>
                    <td class="center">'.$g->Ppn.'</td>
                    <td class="center">'.$g->LokasiPengiriman.'</td>
                    <td class="center">-</td>
                    

                    
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
            /*
            tr:nth-child(even) {
                background-color: #dddddd;
            }
            */
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
            <h1><center>LAPORAN PENJUALAN<center></h1>
            <table>
              <thead>
                    <tr>
                      <th>NO</th>
                      <th>Tgl. PO</th>
                      <th>No.Kwitansi</th>
                      <th>No.Invoice</th>
                      <th>Nama Customer</th>
                      <th>Jenis BBM</th> 
                      <th>Jenis Satuan</th>
                      <th>Quantity</th>  
                      <th>Harga</th>
                      <th>Total Harga</th>
                      <th>Nama Kapal di Supply</th>
                      <th>PPN / Non</th>
                      <th>Lokasi Supply</th>
                      <th>Keterangan</th>
                    </tr>      
              </thead>
              <tbody>';

        // $get = $this->db->query("Select *
        //             From PenjualanBBM pb, MstCustomer c, PenjualanBBM_detil p inner join BarangBBM b on p.IdBBM = b.IdBBM 
        //             left outer join PenjualanBBM_MBA mba on p.NoPoCustomer = mba.NoPoCustomer and p.DetilNumber=mba.DetilNumber
        //                 left outer join PenjualanBBM_MBT mbt on p.NoPoCustomer = mbt.NoPoCustomer  and p.DetilNumber=mbt.DetilNumber
        //                 and p.DetilNumber = mba.DetilNumber 
        //             where pb.NoPoCustomer = p.NoPoCustomer and pb.IdCustomer = c.IdCustomer and b.IdBBM='$id' order by pb.tglPo asc");      
        
        $get = $this->db->query("select pb.TglPO, pb.NoPoCustomer, pb.NoPO, pb.noInvoice, pb.Ppn, pb.MBAOAT, b.NamaBBM, pd.Harga, pd.Quantity, mp.nilai, pd.SubTotal, k.VesselName, pb.LokasiPengiriman, c.NamaCustomer 
                                from PenjualanBBM pb, barangbbm b, mstpbbkb mp, mstcustomer c,  penjualanbbm_detil pd
                                left outer join penjualanbbm_mba pmb on (pmb.NoPOCustomer = pd.NoPoCustomer and pmb.DetilNumber = pd.DetilNumber)
                                left outer join penjualanbbm_mbt pmt on (pmt.NoPOCustomer = pd.NoPoCustomer and pmt.DetilNumber = pd.DetilNumber)
                                left outer join mstkapal k on  pmb.IdVessel = k.IdVessel
                                where pd.NoPOCustomer = pb.NoPOCustomer and b.IdBBM = pd.IdBBM and mp.idPBBKB = pb.idPBBKB and pb.idcustomer = c.idcustomer
                                and b.IdBBM='$id' order by pb.tglPo asc");



         $count=0;
        foreach($get->result() as $g)
        {
            $count++;
            $hasil .= '
                <tr>
                    <td class="center">'.$count.'</td>
                    <td class="center">'.$g->TglPO.'</td>
                    <td class="center">'.intval(preg_replace('/[^0-9]+/', '', $g->NoPoCustomer), 10).'/I.I/'.$this->getMonthRomawi().'/'.(date('m')).'/'.date('Y').'</td>
                    <td class="center">'.$g->noInvoice.'</td>
                    <td class="center">'.$g->NamaCustomer.'</td>
                    <td class="center">'.$g->NamaBBM.'</td>
                    <td class="center">'.'Liter'.'</td>
                    <td class="center">' .number_format($g->Quantity,0,".",".").'</td>
                    <td class="center">Rp.' .number_format($g->Harga,0,".",".").'</td>
                    <td class="center">Rp. ' .number_format($g->SubTotal,0,".",".").'</td>
                    <td class="center">' .$g->VesselName.'</td>
                    <td class="center">'.$g->Ppn.'</td>
                    <td class="center">'.$g->LokasiPengiriman.'</td>
                    <td class="center">-</td>
                    

                    
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
                width: 80%;
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
            <h1><center>LAPORAN PENJUALAN<center></h1>
            <table>
              <thead>
                    <tr>
                      <th>NO</th>
                      <th>Tgl. PO</th>
                      <th>No.Kwitansi</th>
                      <th>No.Invoice</th>
                      <th>Nama Customer</th>
                      <th>Jenis BBM</th> 
                      <th>Jenis Satuan</th>
                      <th>Quantity</th>  
                      <th>Harga</th>
                      <th>Total Harga</th>
                      <th>Nama Kapal di Supply</th>
                      <th>PPN / Non</th>
                      <th>Lokasi Supply</th>
                      <th>Keterangan</th>
                    </tr>      
              </thead>
              <tbody>';

        // $get = $this->db->query("Select *
        //             From PenjualanBBM pb, MstCustomer c, PenjualanBBM_detil p inner join BarangBBM b on p.IdBBM = b.IdBBM 
        //             left outer join PenjualanBBM_MBA mba on p.NoPoCustomer = mba.NoPoCustomer and p.DetilNumber=mba.DetilNumber
        //                 left outer join PenjualanBBM_MBT mbt on p.NoPoCustomer = mbt.NoPoCustomer  and p.DetilNumber=mbt.DetilNumber
        //                 and p.DetilNumber = mba.DetilNumber 
        //             where pb.NoPoCustomer = p.NoPoCustomer and pb.IdCustomer = c.IdCustomer and TglPO>='$tglAwal' and TglPO <='$tglAkhir'");      
        
        $get = $this->db->query("select pb.TglPO, pb.NoPoCustomer, pb.NoPO, pb.noInvoice, pb.Ppn, pb.MBAOAT, b.NamaBBM, pd.Harga, pd.Quantity, mp.nilai, pd.SubTotal, k.VesselName, pb.LokasiPengiriman, c.NamaCustomer 
        from PenjualanBBM pb, barangbbm b, mstpbbkb mp, mstcustomer c,  penjualanbbm_detil pd
        left outer join penjualanbbm_mba pmb on (pmb.NoPOCustomer = pd.NoPoCustomer and pmb.DetilNumber = pd.DetilNumber)
        left outer join penjualanbbm_mbt pmt on (pmt.NoPOCustomer = pd.NoPoCustomer and pmt.DetilNumber = pd.DetilNumber)
        left outer join mstkapal k on  pmb.IdVessel = k.IdVessel
        where pd.NoPOCustomer = pb.NoPOCustomer and b.IdBBM = pd.IdBBM and mp.idPBBKB = pb.idPBBKB and pb.idcustomer = c.idcustomer
        and TglPO>='$tglAwal' and TglPO <='$tglAkhir' order by TglPO asc");

        
        $count=0;
        foreach($get->result() as $g)
        {
            $count++;
            $hasil .= '
                <tr>
                    <td class="center">'.$count.'</td>
                    <td class="center">'.$g->TglPO.'</td>
                    <td class="center">'.intval(preg_replace('/[^0-9]+/', '', $g->NoPoCustomer), 10).'/I.I/'.$this->getMonthRomawi().'/'.(date('m')).'/'.date('Y').'</td>
                    <td class="center">'.$g->noInvoice.'</td>
                    <td class="center">'.$g->NamaCustomer.'</td>
                    <td class="center">'.$g->NamaBBM.'</td>
                    <td class="center">'.'Liter'.'</td>
                    <td class="center">' .number_format($g->Quantity,0,".",".").'</td>
                    <td class="center">Rp.' .number_format($g->Harga,0,".",".").'</td>
                    <td class="center">Rp. ' .number_format($g->SubTotal,0,".",".").'</td>
                    <td class="center">' .$g->VesselName.'</td>
                    <td class="center">'.$g->Ppn.'</td>
                    <td class="center">'.$g->LokasiPengiriman.'</td>
                    <td class="center">-</td>
                    

                    
                </tr>';
            
        }

        $hasil .= "</tbody>";
        $hasil .= "</table>";
        $hasil .= "</div>";
        $hasil .= "</section>";
        return $hasil;
  }  
  function getMonthRomawi()
  {
    $month = "I";

    if (date('n') == 1)
    {
      $month = "I"; 
    }
    else if (date('n') == 2)
    {
      $month = "II";  
    } 
    else if (date('n') == 3)
    {
      $month = "III"; 
    }
    else if (date('n') == 4)
    {
      $month = "IV";  
    }
    else if (date('V') == 5)
    {
      $month = "V"; 
    }
    else if (date('n') == 6)
    {
      $month = "VI";  
    }
    else if (date('n') == 7)
    {
      $month = "VII"; 
    }
    else if (date('n') == 8)
    {
      $month = "VIII";  
    }
    else if (date('n') == 9)
    {
      $month = "IX";  
    }
    else if (date('n') == 10)
    {
      $month = "X"; 
    }
    else if (date('n') == 11)
    {
      $month = "XI";  
    }
    else if (date('n') == 12)
    {
      $month = "XII"; 
    }   
    return $month;  
  } 
}

