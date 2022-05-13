<div class="modal fade" id="category-modal" tabindex="-1" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header border-bottom py-3">
          <h5 class="modal-title category-modal-title"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form enctype="multipart/form-data" id="category-form">
                @csrf
                <x-textbox name="category_name" labelName="Category Name"/>

                <x-textbox type="file" name="category_icon" labelName="Category icon" />

                <x-selectbox name="parent_category" labelName="Parent Category">
                    <option value="0">Parent Category</option>
                    @foreach (STATUS as $key=>$value)
                        <option value="{{ $key }}"> {{ $value }}</option>
                    @endforeach
                </x-selectbox>

                <x-selectbox name="status" labelName="Status">
                    <option value="">Select Please</option>
                    @foreach (STATUS as $key=>$value)
                        <option value="{{ $key }}"> {{ $value }}</option>
                    @endforeach
                </x-selectbox>

                <div class="form-group text-end">
                    <button type="submit" class="btn btn-sm btn-primary save-btn"></button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
