<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TransaksiAlterAlamat extends Migration
{
	public function up()
	{
		//Fungsi buat array
		$fields = [
			'alamat'=>[
				'type'=>'TEXT'
			],
			'ongkir'=>[
				'type'=>'INT',
			],
			'status'=>[
				'type'=>'INT',
				'constraint'=>1,
			],
		];

		$this->forge->addColumn('transaksi', $fields);
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropColumn('transaksi', ['alamat','ongkir','status']);
	}
}
