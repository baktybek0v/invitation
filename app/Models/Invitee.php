<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class Invitee extends Model
{
    use HasFactory;

	protected $guarded = ['id', 'uniq_code'];

	public function getTitle($lang) {
		$lang = strtolower($lang);

		if ($lang == 'eng') {
			if ($this->title_en == 'Mr.') return "Dear Mr.";
			if ($this->title_en == 'Ms.') return "Dear Ms.";
		}
		if ($lang == 'ru') {
			if ($this->title_ru == 'Г-н')  return "Уважаемая г-н"; 
			if ($this->title_ru == 'Г-жа') return "Уважаемый г-жа";
		}
		if ($lang == 'kg')  {
			return "Урматтуу"; 
		}

		return '';
	}

	public function getFullName($lang) {
		$lang = strtolower($lang);

		if ($lang == 'eng') return $this->full_name_en;
		if ($lang == 'ru')  return $this->full_name_ru;
		if ($lang == 'kg')  return $this->full_name_ru;
	}

	public function getFirstLang() {
		$languages = explode("/", $this->languages);
		return strtolower($languages[0]);
	}

	public function getAllLang() {
		$languages = [];

		foreach (explode("/", $this->languages) as $item) {
			$languages[] = strtolower($item);
		}

		return $languages;
	}

	public function getAvialFullName() {
		if 		($this->full_name_ru && mb_strlen($this->full_name_ru) > 0) return $this->full_name_ru;
		else if ($this->full_name_en && mb_strlen($this->full_name_en) > 0) return $this->full_name_en;
		else if ($this->full_name_ky && mb_strlen($this->full_name_ky) > 0) return $this->full_name_ky;
		else 																return '';
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function event()
	{
		return $this->belongsTo(Event::class);
	}
	
	public function getNumber() {
		if (trim($this->number)){
			return "<span class='text-nowrap label label-lg label-dark label-inline'>"
				. $this->number .
			"</span>";
		} else return NULL;
	}
	
	public function getSended() {
		if ($this->sended) {
			return "<span class='text-nowrap label label-lg label-light-success label-inline'>Отправлено</span>";
		} else {
			return "<span class='text-nowrap label label-lg label-light-danger label-inline'>Не отправлено</span>";
		}
	}

	public function getDuplicate() {
		if ($this->duplicate) {
			return "<span class='text-nowrap label label-lg label-light-success label-inline'>Разрешено</span>";
		} else {
			return "<span class='text-nowrap label label-lg label-light-danger label-inline'>Не разрешено</span>";
		}
	}

	public function getStatus() {
		if ($this->status == 'accept') {
			return "<span class='text-nowrap label label-lg label-light-success label-inline'>Принято</span>";
		}
		if ($this->status == 'reject') {
			return "<span class='text-nowrap label label-lg label-light-danger label-inline'>Отказано</span>";
		}
		if ($this->status == 'pending') {
			return "<span class='text-nowrap label label-lg label-light-warning label-inline'>В ожидании</span>";
		}
		return '';
	}



}
