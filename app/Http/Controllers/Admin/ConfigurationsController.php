<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Configuration;
use Storage;

class ConfigurationsController extends Controller
{
    public function admin_index() {
        $page_title = __('Configuration');

        $configurations = Configuration::select('id', 'name', 'value')->orderBy('order')->paginate(config('Reading.nodes_per_page'));
        return view('admin.configurations.admin_index', compact('configurations', 'page_title'));
    }

    /**
     * This method handles the configuration settings for the admin prefix.
     *
     * @param Request $request The HTTP request object.
     * @param string|null $prefix The prefix for the configuration settings. Defaults to NULL.
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View The response or view.
     */
    public function admin_prefix(Request $request, $prefix = NULL) {
        $page_title ='Configuration';

        // if($request->isMethod('post')){
        // }else{
        //     //dd($prefix);
        //     $page_title = $prefix;
        //     switch ($page_title) {
        //         case 'Site':
        //             echo "Site";
        //             break;

        //         case 'Writing':
        //             echo "Writing";
        //             break;
        //         case 'Reading':
        //             echo "Reading";
        //             break;

        //         case 'Social':
        //             $configurations = Configuration::select('id', 'name', 'value', 'title', 'description', 'input_type', 'editable', 'weight', 'params')->where('input_type','LIKE','social_network')->get();
        //             return view('admin.configurations.admin_prefix_social', compact('configurations', 'prefix','page_title'));
        //         case 'Permalink':
        //             $routesType = array(
        //                 'Plain'=> '',
        //                 'DayName'=> '/%year%/%month%/%day%/%slug%/',
        //                 'MonthName'=> '/%year%/%month%/%slug%/',
        //                 'Numeric'=> '/archives/%post_id%',
        //                 'PostName'=> '/%slug%/',
        //                 'CustomeStructure' => 'custom',
        //             );
        //             $configuration = Configuration::select('id', 'name', 'value', 'title', 'description', 'input_type', 'editable', 'weight', 'params')->where('name', 'LIKE', $prefix.'%')->first();
        //             return view('admin.configurations.admin_permalink_prefix', compact('configuration', 'prefix', 'routesType','page_title'));

        //         case 'Widget':
        //             echo "Widget";
        //             break;
        //         case 'Theme':
        //             echo "Theme";
        //             break;
        //     }
        // }
 


        if($request->isMethod('post')) {

            if($request->has('Configuration')) {
                $newArr = array();
                $fileNameArr = $this->__imageSave($request);
                foreach ($request->input('Configuration') as $key => $config_value) {

                    if(!isset($config_value['value']) && $config_value['input_type'] == 'checkbox') {
                        $config_value['value'] = 0;
                    } else if(isset($config_value['value'])) {
                        $config_value['value'] = $config_value['value'];
                    }
                    if(array_key_exists($key, $fileNameArr))
                    {
                        $config_value['value'] = $fileNameArr[$key];
                    }
                    $res = Configuration::where('id', '=', $key)->update($config_value);
                }
                return redirect()->back()->with('success', __('Configuration updated successfully'));
            } else
            {
                return redirect()->back()->with('error', __('There are some problem in form submition.'));
            }
        } else {
            $page_title = $prefix;
            if($prefix == 'Permalink')
            {
                $routesType = array(
                                'Plain'=> '',
                                'DayName'=> '/%year%/%month%/%day%/%slug%/',
                                'MonthName'=> '/%year%/%month%/%slug%/',
                                'Numeric'=> '/archives/%post_id%',
                                'PostName'=> '/%slug%/',
                                'CustomeStructure' => 'custom',
                            );
                $configuration = Configuration::select('id', 'name', 'value', 'title', 'description', 'input_type', 'editable', 'weight', 'params')->where('name', 'LIKE', $prefix.'%')->first();
                return view('admin.configurations.admin_permalink_prefix', compact('configuration', 'prefix', 'routesType','page_title'));
            }
            $configurations = Configuration::select('id', 'name', 'value', 'title', 'description', 'input_type', 'editable', 'weight', 'params')->where('name', 'LIKE', $prefix.'%')->get();
            return view('admin.configurations.admin_prefix', compact('configurations', 'prefix','page_title'));
        }

    }

    public function admin_view($id = null) {
        $configuration = Configuration::select('id', 'name', 'value')->firstWhere('id', $id);
        return view('admin.configurations.admin_view', compact('configuration'));
    }

    public function admin_add(Request $request){
        if($request->isMethod('post')) {

            $validation = $this->validate($request, [
                    'Configuration.name' => 'required|unique:configurations,name',
                ]
            );

            $new_configuration = [
                'name'=> $request->input('Configuration.name'),
                'value'=> $request->input('Configuration.value'),
                'title'=> $request->input('Configuration.title'),
                'input_type'=> $request->input('Configuration.input_type'),
                'description'=> $request->input('Configuration.description') ? $request->input('Configuration.description') : '',
                'params'=> $request->input('Configuration.params') ? $request->input('Configuration.params') : '',
                'editable'=> $request->input('Configuration.editable') ? 1 : 0,
            ];

            $res = Configuration::create($new_configuration);

            if($res)
            {
                return redirect()->route('admin.configurations.admin_index')->with('success', __('Configuration added successfully'));
            } else
            {
                return redirect()->route('admin.configurations.admin_index')->with('error', __('There are some problem in form submition.'));
            }
        } else {
            return view('admin.configurations.admin_add');
        }
    }

    public function admin_edit(Request $request, $id) {
        $configuration = Configuration::findorFail($id);

        if($request->isMethod('post')) {

            $validation = $this->validate($request, [
                    'Configuration.name' => 'required|unique:configurations,name,'.$id,
                ]
            );

            $edit_configuration = [
                'name'                  => $request->input('Configuration.name'),
                'value'                 => $request->input('Configuration.value'),
                'title'                 => $request->input('Configuration.title'),
                'input_type'            => $request->input('Configuration.input_type'),
                'description'           => $request->input('Configuration.description'),
                'params'                => $request->input('Configuration.params'),
                'editable'              => $request->input('Configuration.editable') ? 1 : 0,
            ];

            $res = Configuration::where('id', '=', $id)->update($edit_configuration);

            if($res)
            {
                return redirect()->route('admin.configurations.admin_index')->with('success', __('Configuration updated successfully'));
            } else
            {
                return redirect()->route('admin.configurations.admin_index')->with('error', __('There are some problem in form submition.'));
            }
        } else {
            return view('admin.configurations.admin_edit', compact('configuration'));
        }
    }

    public function admin_delete($id = NUll) {

        $configuration = Configuration::findorFail($id);
        $res = $configuration->delete();

        if($res)
        {
            return redirect()->route('admin.configurations.admin_index')->with('success', __('Configuration deleted successfully'));
        } else
        {
            return redirect()->route('admin.configurations.admin_index')->with('error', __('There are some problem.'));
        }
    }

    /**
     * Admin moveup
     *
     * @param integer $id
     * @param integer $step
     * @return void
     * @access public
     */
    public function admin_moveup($id, $step = 1)
    {
        $configuration = new Configuration();
        $res = $configuration->moveUp($id, $step);
        if($res)
        {
            return redirect()->back()->with('success', __('Moved up successfully.'));
        }
        else
        {
            return redirect()->back()->with('success', __('Could not move up.'));
        }
    }

    /**
     * Admin moveup
     *
     * @param integer $id
     * @param integer $step
     * @return void
     * @access public
     */
    public function admin_movedown($id, $step = 1)
    {
        $configuration = new Configuration();
        $res = $configuration->moveDown($id, $step);
        if($res)
        {
            return redirect()->back()->with('success', __('Moved down successfully.'));
        }
        else
        {
            return redirect()->back()->with('success', __('Could not move down.'));
        }
    }


    /**
    * image save function
    *
    *
    **/
    private function __imageSave($request) {
        $fileNameArr = array();
        if(empty($request->file('Configuration')))
        {
            return $fileNameArr;
        }
        foreach($request->file('Configuration') as $imgKey => $imgValue)
        {
            if (is_array($imgValue['value'])) {

                foreach ($imgValue['value'] as $image) {
                    $fileName = $image->hashName();
                    $image->storeAs('public/configuration-images', $image->hashName());
                    $fileFullName[] = $fileName;
                }

                $fileName = implode(",",$fileFullName);

            }else {

                $fileName = time().'.'.$imgValue['value']->getClientOriginalName();
                $imgValue['value']->storeAs('public/configuration-images', $fileName);

            }
                $fileNameArr[$imgKey] = $fileName;
        }
        return $fileNameArr;
    }

    public function save_permalink(Request $request)
    {
        $permalink_selection    = $request->input('permalink_selection');
        if($permalink_selection == 'custom')
        {
            $permalink_selection = $request->input('permalink_structure');
        }
        $configuration= Configuration::where('name', '=', 'Permalink.settings')->update(['value' => $permalink_selection]);

        if($configuration)
        {
            return redirect()->back()->with('success', __('Configuration updated successfully.'));
        }
        return redirect()->back()->with('error', __('There are some problem.'));
    }

    public function remove_config_image($id, $image)
    {
        $config = Configuration::where('id', '=', $id)->first();
        $images = explode(",",$config->value);
        if(($key = array_search($image, $images)) !== false)
        {
            unset($images[$key]);
        }
        if(!empty($config->value) && Storage::exists('public/configuration-images/'.$image))
        {
            $images = explode(",",$config->value);
            if(($key = array_search($image, $images)) !== false)
            {
                unset($images[$key]);
            }
            Storage::delete('public/configuration-images/'.$image);
            $config->value = implode(',', $images);
            return $config->save();
        }
    }

}
