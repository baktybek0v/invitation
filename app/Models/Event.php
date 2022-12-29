<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Invitee;
use App\Models\InviteeQr;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;

	protected $guarded = ['id', 'uniq_code', 'qr_en', 'qr_ru', 'qu_ky'];

	public function getAvialTitle() {
		if 		($this->title_ru && mb_strlen($this->title_ru) > 0) return $this->title_ru;
		else if ($this->title_en && mb_strlen($this->title_en) > 0) return $this->title_en;
		else if ($this->title_ky && mb_strlen($this->title_ky) > 0) return $this->title_ky;
		else 														return '';
	}

	public function getTitle($lang) {
		$lang = strtolower($lang);

		if ($lang == 'eng') return $this->title_en;
		if ($lang == 'ru')  return $this->title_ru;
		if ($lang == 'kg')  return $this->title_ky;
		return '';
	}

	public function getDescription($lang) {
		$lang = strtolower($lang);

		if ($lang == 'eng') return $this->description_en;
		if ($lang == 'ru') return $this->description_ru;
		if ($lang == 'kg') return $this->description_ky;
		return '';
	}

	public function getAcceptAnswer($lang) {
		$lang = strtolower($lang);

		if ($lang == 'eng') return $this->accept_answer_en;
		if ($lang == 'ru')  return $this->accept_answer_ru;
		if ($lang == 'kg')  return $this->accept_answer_ky;
		return '';
	}

	public function getRejectAnswer($lang) {
		$lang = strtolower($lang);

		if ($lang == 'eng') return $this->reject_answer_en;
		if ($lang == 'ru')  return $this->reject_answer_ru;
		if ($lang == 'kg')  return $this->reject_answer_ky;
		return '';
	}


	public function getDayOfMonth() {
		$date = new Carbon($this->start_date);
		return $date->day;
	}

	public function getMonthName() {
		$date = new Carbon($this->start_date);

		$ruMonths = ['Январь', 'Февраль', 'Март', 'Апрель',
					'Май', 'Июнь', 'Июль', 'Август',
					'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь' ];

		$ruMonthName = mb_strtolower($ruMonths[$date->month - 1]);
		return $ruMonthName;
	}

	public function getYear() {
		$date = new Carbon($this->start_date);
		return $date->year;
	}


	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function invitees()
	{
		return $this->hasMany(Invitee::class);
	}

	public function getSendedInvites()
	{
		$sended = $this->invitees->filter(function ($value) {
			return $value->sended == true;
		});
		return $sended;
	}

	
	public function getNotSendedInvitess()
	{
		$sended = $this->invitees->filter(function ($value) {
			return $value->sended == false;
		});
		return $sended;
	}

	public function inviteesQr()
	{
		return $this->hasMany(InviteeQr::class);
	}


	public function getInviteesPending()
	{
		$pendings = $this->invitees->filter(function ($value, $key) {
			return $value->status == 'pending';
		});

		return $pendings;
	}

	public function getInviteesAccept()
	{
		$inviteesWhoAccept = $this->invitees->filter(function ($value, $key) {
			return $value->status == 'accept';
		});

		return $inviteesWhoAccept;
	}

	public function getInviteesQrAccept()
	{
		$inviteesQrWhoAccept = $this->inviteesQr->filter(function ($value, $key) {
			return $value->status == 'accept';
		});

		return $inviteesQrWhoAccept;
	}

	public function getInviteesReject()
	{
		$inviteesWhoReject = $this->invitees->filter(function ($value, $key) {
			return $value->status == 'reject';
		});

		return $inviteesWhoReject;
	}

	public function getInviteesQrReject()
	{
		$inviteesQrWhoReject = $this->inviteesQr->filter(function ($value, $key) {
			return $value->status == 'reject';
		});

		return $inviteesQrWhoReject;
	}

	public function getStatus() {
		$resendedAmount = $this->resended_amount ?? 0;
	
		if ($this->status == 'created') {
			return "<span class='text-nowrap label label-lg label-warning label-inline'>Создано</span>";
		}
		if ($this->status == 'sended') {
			return "<span class='text-nowrap label label-lg label-success label-inline'>Отправлено</span>";
		}	
		if ($this->status == 'resended') {
			return "
				<span class='text-nowrap label label-lg label-info label-inline'>Переотправлено</span>
				<span class='text-nowrap label label-lg label-light-dark label-inline'>$resendedAmount раз</span>
			";
		}
		return '';
	}

	public function getSendedPercentage($styled = true) {
		$total =  $this->invitees->count();	
		$sended = $this->getSendedInvites()->count();

		if ($total > 0 && $sended > 0)	$percent = $sended * 100 / $total;
		else 							$percent = 0;
		
		$percent = round($percent, 2);

		if ($styled) {
			return "<span class='label label-lg label-light-success label-inline'>" . $percent . "%</span>";
		} 
		else return $percent;
	}

	public function getSendedBar() {
		$total =  $this->invitees->count();		// 500
		$sended = $this->getSendedInvites()->count();	// 200

		if ($total > 0 && $sended > 0)	$percent = $sended * 100 / $total;
		else 							$percent = 0;

						// 
		return "<span class='label label-lg label-light-success label-inline'>" . $percent . "%</span>";
	}
}
