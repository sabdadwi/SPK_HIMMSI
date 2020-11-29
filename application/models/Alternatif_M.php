<?php

class Alternatif_M extends CI_model
{
  public function getAllAlternatif()
  {
    return $this->db->get('alternatif')->result_array();
  }

  public function getAlternatifId($id)
  {
    return $this->db->get_where('alternatif', ['id_alternatif' => $id])->row_array();
  }

  public function KodeAlternatif()
  {
    $query = $this->db->query("select max(kode_alternatif) as max_id from alternatif");
    $rows = $query->row();
    $kode = $rows->max_id;
    $noUrut = (int) substr($kode, 1, 2);
    $noUrut++;
    $char = "A";
    $kode = $char . sprintf("%s", $noUrut);
    return $kode;
  }

  public function tambahAlternatif()
  {
    $data = [
      'kode_alternatif' => $this->input->post('kode'),
      'nim' => $this->input->post('nim'),
      'nama' => $this->input->post('nama'),
      'jenkel' => $this->input->post('jenkel'),
      'prodi' => $this->input->post('prodi'),
      'email' => $this->input->post('email'),
      'foto' => $this->upload->data('file_name')
    ];
    $this->db->insert('alternatif', $data);

    // ? Memasukkan id_alternatif ke tabel nilai dan kecocokan
    $id_alternatif = $this->db->insert_id();
    $parameter = [
      'id_alternatif' => $id_alternatif
    ];
    $this->db->insert('nilai', $parameter);
    $this->db->insert('kecocokan', $parameter);
  }

  public function ubahAlternatif()
  {
    $id = $this->input->post('id');
    $data = [
      'kode_alternatif' => $this->input->post('kode'),
      'nim' => $this->input->post('nim'),
      'nama' => $this->input->post('nama'),
      'jenkel' => $this->input->post('jenkel'),
      'prodi' => $this->input->post('prodi'),
      'email' => $this->input->post('email')
    ];
    $this->db->where('id_alternatif', $id);
    $this->db->update('alternatif', $data);
  }

  public function hapusAlternatif($id)
  {
    $this->db->delete('alternatif', ['id_alternatif' => $id]);
  }
}
