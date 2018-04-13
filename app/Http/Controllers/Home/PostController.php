<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Post;
use Log;

class PostController extends Controller
{
    /**
     * 文章列表页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::orderby('created_at', 'desc')->paginate(5);
        Log::info('post_index', ['data' => 'this is post index']);
        return view('Home.article.index', compact('posts'));
    }

    /**
     * 文章详情页
     * @param $id
     * @return string
     */
    public function show(Post $post)
    {
        return view('Home.article.show', compact('post'));
    }

    /**
     * 文章创建页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('Home.article.create');
    }

    /**保存数据
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function posts()
    {
        //验证
        $this->validate(request(),[
           'title' => 'required|string|max:100|min:5',
            'content' => 'required|string|min:10'
        ],[
            'title.min' => '文章标题过短'
        ]);
        $param = request(['title','content']);
        Post::create($param);
        return redirect('/posts');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Post $post)
    {
        return view('Home.article.edit', compact('post'));
    }
    public function update(Post $post)
    {
        //TODO::用户权限验证


        //验证
        $this->validate(request(),[
            'title' => 'required|string|max:100|min:5',
            'content' => 'required|string|min:10'
        ],[
            'title.min' => '文章标题过短'
        ]);
        $post->title = request('title');
        $post->content = request('content');
        $post->save();
        return redirect('/posts/'.$post->id);
    }
    public function delete($id)
    {
        //TODO::用户权限验证

        Post::destroy($id);
        return redirect('/posts');
    }

    /**
     *上传图片
     */
    public function imageUpload(Request $request)
    {
        $path = $request->file('fileName')->storePublicly(md5(time()));
        $data = [
            'errno' => 0,
            'data' => [asset('storage/'. $path)]
        ];
        return json_encode($data);
    }
}
