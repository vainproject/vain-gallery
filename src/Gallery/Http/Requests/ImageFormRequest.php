<?php

namespace Modules\Gallery\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Vain\Http\Requests\Request;

class ImageFormRequest extends Request
{
    /**
     * validation that has to pass.
     *
     * @return array
     */
    public function rules()
    {
        $attributes = [
            'title' => 'required',
        ];

        $rules = $this->buildLocalizedRules($attributes);

        return array_merge($rules, [
            'id'   => 'exists:gallery_images,id',
            'slug' => 'required|alpha_dash|unique:gallery_images,slug,'.$this->route('images'),
            'album_id' => 'required|exists:gallery_albums,id'
        ]);
    }

    private function buildLocalizedRules($attributes)
    {
        $rules = [];
        $locales = config('app.locales');

        foreach ($locales as $locale => $name) {
            foreach ($attributes as $attribute => $rule) {
                $rules[$attribute.'_'.$locale] = $rule;
            }
        }

        return $rules;
    }

    protected function failedValidation(Validator $validator)
    {
        if ($this->ajax()) {
            $this->session()->flashInput($this->all());
            $this->session()->flash('errors', $validator->getMessageBag());
        }

        parent::failedValidation($validator);
    }
}
