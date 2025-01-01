<?php

namespace App\Notifications;

use App\Models\Peminjaman;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PeminjamanNotification extends Notification
{
	use Queueable;

	private $peminjaman;
	/**
	 * Create a new notification instance.
	 */
	public function __construct($peminjaman)
	{
		$this->peminjaman = $peminjaman;
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
		return (new MailMessage)
			->subject('Peminjaman Baru Diterima')
			->greeting('Halo Admin,')
			->line('Ada peminjaman baru yang telah diajukan oleh pengguna.')
			->line('Kode Peminjaman: ' . $this->peminjaman['kode_peminjaman'])
		;
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
