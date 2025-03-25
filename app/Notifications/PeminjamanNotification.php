<?php

namespace App\Notifications;

use App\Models\Peminjaman;
use Barryvdh\DomPDF\Facade\Pdf as Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PeminjamanNotification extends Notification
{
	use Queueable;

	protected $peminjaman;
	protected $barang;
	protected $catatan;

	/**
	 * Create a new notification instance.
	 */
	public function __construct($peminjaman, $barang, $catatan)
	{
		$this->peminjaman = $peminjaman;
		$this->barang = $barang;
		$this->catatan = $catatan;
	}

	/**
	 * Get the notification's delivery channels.
	 *
	 * @return array<int, string>
	 */
	public function via(object $notifiable): array
	{
		return ['mail'];
	}

	/**
	 * Get the mail representation of the notification.
	 */
	public function toMail(object $notifiable): MailMessage
	{
		$pdf = Pdf::loadView('user.laporan.peminjaman.report', [
			'peminjaman' => $this->peminjaman,
			'barang' => $this->barang,
			'catatan' => $this->catatan
		]);

		$pdf->setPaper('a4', 'landscape');

		return (new MailMessage)
			->subject('Peminjaman Barang #' . $this->peminjaman->nomor_peminjaman)
			->greeting('Halo ' . $notifiable->nama_lengkap)
			->line('Ada peminjaman barang baru di ' . config('app.name'))
			->line('Detail Peminjaman:')
			->line('- Nomor Peminjaman: ' . $this->peminjaman->nomor_peminjaman)
			->line('- Peminjam: ' . $this->peminjaman->peminjam)
			->line('- Surat Tugas: ' . $this->peminjaman->nomor_surat)
			->line('- Tanggal Penggunaan: ' . \Carbon\Carbon::parse($this->peminjaman->tanggal_penggunaan)->translatedFormat('d F Y'))
			->line('- Sampai: ' . \Carbon\Carbon::parse($this->peminjaman->tanggal_kembali)->translatedFormat('d F Y'))
			->attachData($pdf->output(), 'peminjaman_' . $this->peminjaman->nomor_peminjaman . '.pdf')
			->line('Silahkan periksa detail peminjaman pada file PDF yang terlampir.')
			->line('Terima kasih.');
	}

	/**
	 * Get the array representation of the notification.
	 *
	 * @return array<string, mixed>
	 */
	public function toArray(object $notifiable): array
	{
		return [
			//
		];
	}
}
