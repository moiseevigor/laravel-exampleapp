<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class FormField extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'form_fields';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['form_id', 'label', 'field_type'];

    public function form()
    {
        return $this->belongsTo('App\Form');
    }

	public static function findByPk($form_id, $order, $cid)
	{
		return FormField::where('form_id', '=', $form_id)
			->where('order', '=', $order)
			->where('cid', '=', $cid)
			->first();
	}
}
