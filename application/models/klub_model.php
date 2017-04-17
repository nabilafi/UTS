<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class klub_model extends CI_Model {

		public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}	

		public function getDataPemain()
		{
			$this->db->select("id,nama,posisi,tanggal_lahir");
			$query = $this->db->get('klub');
			return $query->result();
		}

		public function getPemainByKlub($id)
		{
			$this->db->select("select A.nama as nk, B.* from klub as A join pemain as B on A.id=B.fk_klub where A.id=$id");
			$this->db->where('fk_klub', $id);		
			$query = $this->db->get('pemain');
			return $query->result();
		}

		public function insertKlub()
		{
			$object = array('nama' => $this->input->post('nama'),
				'logo' => $this->upload->data('file_name'));
			$this->db->insert('klub', $object);
		}
		
		/*public function insertPegawai()
		{
			$object  = array(
			'nama' => $this->input->post('nama'),
			'foto' => $this->upload->data('file_name')
			);
		
		$this->db->insert('pegawai',$object);
		}
*/
		public function getKlub($id)
		{
			$this->db->where('id', $id);	
			$query = $this->db->get('klub',1);
			return $query->result();

		}

		public function updateById($id)
		{
			$data = array('nama' => $this->input->post('nama'));
			$this->db->where('id', $id);
			$this->db->update('klub', $data);

		}
		//public function insertJabatan($idPegawai)
		//{
			//$object = array(
				//'namaJabatan' => $this->input->post('jabatan'),
				//'fk_pegawai' => $idPegawai);

			//$this->db->insert('jabatan_pegawai'$object);
		//}

		public function deleteKlub($id)
		{
			$this->db->where('id', $id);	
			$this->db->delete('klub');
		}



}

/* End of file Pegawai_Model.php */
/* Location: ./application/models/Pegawai_Model.php */
 ?>