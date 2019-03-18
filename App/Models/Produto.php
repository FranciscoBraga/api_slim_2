<?

namespace App\Models;
use illuminate\database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable =[
        'titulo','descricao','preco','fabricante','updated_at','created_at'
    ];
}
