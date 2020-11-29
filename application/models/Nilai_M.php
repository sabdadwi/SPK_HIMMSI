<?php

class Nilai_M extends CI_model
{
  // ? Query Untuk menampilkan kd.Alternatif-Nama-dan seluruh isi tabel Nilai
  public function QueryJoinNilaiAlternatif()
  {
    $query = "SELECT `alternatif`.`kode_alternatif`,`alternatif`.`nama`,`nilai`.*
              FROM `nilai` JOIN `alternatif`
              ON `nilai`.`id_nilai`=`alternatif`.`id_alternatif`
              WHERE `nilai`.`id_nilai`=`alternatif`.`id_alternatif`
    ";
    return $this->db->query($query)->result_array();
  }

  public function NilaiAternatif()
  {
    $id_nilai = $this->input->post('id_nilai');
    $id_alternatif = $this->input->post('id_alternatif');

    $c1 = $this->input->post('C1');
    $c2 = $this->input->post('C2');
    $c3 = $this->input->post('C3');
    $c4 = $this->input->post('C4');
    $c5 = $this->input->post('C5');

    $data = [
      'id_alternatif' => $id_alternatif,
      'C1' => $c1,
      'C2' => $c2,
      'C3' => $c3,
      'C4' => $c4,
      'C5' => $c5
    ];

    $this->db->where('id_nilai', $id_nilai);
    $this->db->update('nilai', $data);

    // ! Buat bagian kecocokannya

    $C1 = $this->KecocokanC1($c1);
    $C2 = $this->KecocokanC2($c2);
    $C3 = $this->KecocokanC3($c3);
    $C4 = $this->KecocokanC4($c4);
    $C5 = $this->KecocokanC5($c5);

    $parameters = [
      'C1' => $C1,
      'C2' => $C2,
      'C3' => $C3,
      'C4' => $C4,
      'C5' => $C5
    ];

    $this->db->where('id_alternatif', $id_alternatif);
    $this->db->update('kecocokan', $parameters);
  }


  public function getKecocokan()
  {
    return $this->db->get('kecocokan')->result_array();
  }

  public function KecocokanC1($c1)
  {
    if ($c1 == 'Bagus') {
      $c1 = 3;
    } elseif ($c1 == 'Cukup') {
      $c1 = 2;
    } else {
      $c1 = 1;
    }
    return $c1;
  }

  public function KecocokanC2($c2)
  {
    if ($c2 == 'Bagus') {
      $c2 = 3;
    } elseif ($c2 == 'Cukup') {
      $c2 = 2;
    } else {
      $c2 = 1;
    }
    return $c2;
  }

  public function KecocokanC3($c3)
  {
    if ($c3 == 'Bagus') {
      $c3 = 3;
    } elseif ($c3 == 'Cukup') {
      $c3 = 2;
    } else {
      $c3 = 1;
    }
    return $c3;
  }

  public function KecocokanC4($c4)
  {
    if ($c4 == 'Bagus') {
      $c4 = 3;
    } elseif ($c4 == 'Cukup') {
      $c4 = 2;
    } else {
      $c4 = 1;
    }
    return $c4;
  }

  public function KecocokanC5($c5)
  {
    if ($c5 == 'Bagus') {
      $c5 = 3;
    } elseif ($c5 == 'Cukup') {
      $c5 = 2;
    } else {
      $c5 = 1;
    }
    return $c5;
  }
}
