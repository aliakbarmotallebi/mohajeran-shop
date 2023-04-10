<?php namespace App\Settings;

/**
 * Class SettingsManager
 * @package App\Settings
 */
class SettingStorage {

    /**
     *
     */
    const SETTING_MODEL_NAME = '\App\Models\Setting';

    /**
     * @return mixed
     */
    public function all()
    {
        return $this->resolveDB();
    }

    /**
     * @param $key
     * @param null $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        return $this->all()->get($key, $default);
    }

    /**
     * @param $key
     * @return mixed
     */
    public function has($key)
    {
        return $this->all()->has($key);
    }

    /**
     * @param $key
     * @return mixed
     */
    public function remove($key)
    {
        $deleted = $this->getSettingModel()
            ->where('name', $key)->delete();

        return $deleted;
    }


    /**
     * @param $key
     * @param null $val
     * @return bool|null
     */
    public function set($key, $val = null)
    {
        // if its an array, batch save settings
        if (is_array($key)) {
            foreach ($key as $name => $value) {
                $this->set($name, $value);
            }

            return true;
        }

        $setting = $this->getSettingModel()->unguarded(function() use($key) {
            return $this->getSettingModel()->firstOrNew(
                ['name' => (string)$key]);
        });

        $setting->value = $val;
        $setting->save();

        return $val;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|mixed
     */
    private function getSettingModel()
    {
        return app(self::SETTING_MODEL_NAME);
    }

    /**
     * @return mixed
     */
    private function resolveDB()
    {
        return $this->getSettingModel()->pluck('value', 'name');
    }
}