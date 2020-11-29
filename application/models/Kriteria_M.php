<?php

class Kriteria_M extends CI_model
{
  public function getAllKriteria()
  {
    return $this->db->get('kriteria')->result_array();
  }

  public function getKriteriaById($id)
  {
    return $this->db->get_where('kriteria', ['id' => $id])->row_array();
  }

  public function sumBobot()
  {
    $this->db->select_sum('bobot');
    $query = $this->db->get('kriteria');
    if ($query->num_rows() > 0) {
      return $query->row()->bobot;
    } else {
      return 0;
    }
  }

  public function KodeKriteria()
  {
    $query = $this->db->query("select max(kode_kriteria) as max_id from kriteria");
    $rows = $query->row();
    $kode = $rows->max_id;
    $noUrut = (int) substr($kode, 1, 2);
    $noUrut++;
    $char = "C";
    $kode = $char . sprintf("%s", $noUrut);
    return $kode;
  }

  public function tambahKriteria()
  {
    $jumlahB = $this->sumBobot();
    $kode = $this->KodeKriteria();
    $bobot = $this->input->post('bobot');

    // Atur Jumlah nilai Bobot
    // Cek apakah jumlah bobot masih <10,jika iya masukkan data, jika tidak tampilkan error
    if ($jumlahB + $bobot > 10) {
      $this->session->set_flashdata(
        'message',
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      Jumlah Bobot lebih dari 10, Data Kriteria Gagal ditambahkan !
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>'
      );
      redirect('kriteria');
    } else {
      $data = [
        'kode_kriteria' => $kode,
        'nama_kriteria' => $this->input->post('nama_kriteria'),
        'attribut' => $this->input->post('attribut'),
        'bobot' => $bobot
      ];
      $this->db->insert('kriteria', $data);
    }
  }

  public function ubahKriteria()
  {
    $id = $this->input->post('id');
    // $cek = $this->getKriteriaById($id);
    // $Bbt = $cek['bobot']; //Ambil bobot lamanya
    $bobot = $this->input->post('bobot'); //Ambil Bobot Barunya
    // $jumlahB = $this->sumBobot();

    // if (($jumlahB - $Bbt) + $bobot > 10) {
    //   $this->session->set_flashdata(
    //     'message',
    //     '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    //   Jumlah Bobot lebih dari 10, Data Kriteria Gagal diubah !
    // <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //   <span aria-hidden="true">&times;</span>
    // </button>
    // </div>'
    //   );

    //   redirect('kriteria');
    // } else {
    $data = [
      'kode_kriteria' => $this->input->post('kode'),
      'nama_kriteria' => $this->input->post('nama_kriteria'),
      'attribut' => $this->input->post('attribut'),
      'bobot' => $bobot
    ];

    $this->db->where('id', $id);
    $this->db->update('kriteria', $data);
    // }
  }

  public function hapusKriteria($id)
  {
    $this->db->delete('kriteria', ['id' => $id]);
  }
}
