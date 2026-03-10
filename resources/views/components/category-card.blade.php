<div x-data="{ categoria: '' }" class="space-y-4 mb-3">
    <input type="hidden" name="categoria" :value="categoria" required>

    <label class="block text-sm font-medium mb-2">Selecione uma categoria</label>
    
    <div class="flex flex-wrap gap-2">

        <button 
            type="button"
            @click="categoria = 'Estudos'"
            :class="categoria === 'Estudos' ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-700'"
            class="px-4 py-2 rounded-lg transition-colors duration-200 font-semibold">
            Estudos
        </button>

        <button 
            type="button"
            @click="categoria = 'Pessoal'"
            :class="categoria === 'Pessoal' ? 'bg-green-600 text-white' : 'bg-gray-200 text-gray-700'"
            class="px-4 py-2 rounded-lg transition-colors duration-200 font-semibold">
            Pessoal
        </button>

        <button 
            type="button"
            @click="categoria = 'Trabalho'"
            :class="categoria === 'Trabalho' ? 'bg-purple-600 text-white' : 'bg-gray-200 text-gray-700'"
            class="px-4 py-2 rounded-lg transition-colors duration-200 font-semibold">
            Trabalho
        </button>
    </div>

    <p class="text-xs text-gray-500">
        Selecionado: <span x-text="categoria || 'Nenhum'" class="font-bold"></span>
    </p>
</div>